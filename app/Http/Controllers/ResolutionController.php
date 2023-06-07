<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use App\Models\User;
use App\Models\Group;
use App\Models\ActionStatus;
use App\Models\Purpose;
use App\Models\Notification;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreResolutionRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

use App\Jobs\SendResolutionStartedEmailsJob;
use App\Jobs\SendResolutionClosedEmailsJob;
use App\Jobs\SendResolutionCirculatedEmailsJob;

class ResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resolutions = Resolution::where('deleted_at', NULL)->get();
        return Inertia::render('Resolutions/Index',compact('resolutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Resolutions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        $request['slug']= Str::of($request->input('subject'))->slug('_');

        $request['uuid'] = (string) Str::uuid();

        $voting_deadline = $request['voting_deadline'];





        DB::beginTransaction();

            $resolution = Resolution::create($request->all());

            $notifications = array();



            foreach ($request->input('reminders') as $day ) {

             $notification = new Notification;

             $notification->notification_type_id = 1;
             $notification->created_by = $request['created_by'];
             $notification->account_id = $account->id;

             $notification->reminder = $day['reminder'];
             $notification->notification_date =  (new Carbon($voting_deadline))->subDays($day['reminder']);

             $resolution->notifications()->save($notification);

             array_push($notifications, $notification);

            }



        if (!$resolution and !$notifications)
        {
            DB::rollBack();
        }else{
            DB::commit();
            return redirect()->route('resolutions.index')
            ->with('success','Resolution created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $users = User::all();

        $groups = Group::all();

        $purposes = Purpose::all();

        $statuses = ActionStatus::all();

        $resolution = Resolution::findOrFail($id);






        $organizers = DB::table('organizers')
                       ->join('resolutions', 'resolutions.id', '=', 'organizers.organizable_id')
                       ->join('users', 'users.id', '=', 'organizers.organizer_id')
                       ->select(
                             'organizers.primary',
                             'organizers.title as designation',
                             'organizers.id as organizer_id',
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',
                          )->where('resolutions.id', '=', $id)
                          ->where('organizers.organizable_type', '=', 'App\Models\Resolution')
                          ->where('organizers.deleted_at', NULL)
                       ->get();

        $voters = DB::table('participants')
                       ->join('resolutions', 'resolutions.id', '=', 'participants.participantable_id')
                       ->join('users', 'users.id', '=', 'participants.participant_id')

                       ->select(
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as title',
                              'participants.title as designation',
                              'participants.id',

                          )->where('resolutions.id', '=', $id)
                          ->where('participants.participantable_type', '=', 'App\Models\Resolution')
                          ->where('participants.deleted_at', NULL)
                       ->get();








        $agendas = DB::table('agendas')
           ->join('resolutions', 'resolutions.id', '=', 'agendas.agendable_id')
        //    ->join('users', 'users.id', '=', 'agendas.contributor_id')
        //    ->join('purposes', 'purposes.id', '=', 'agendas.purpose_id')
           ->select(
                  'agendas.*',
                //   'users.first_name',
                //   'users.middle_name',
                //   'users.last_name',
                //   'users.title as Title',
                //   'purposes.name as purpose_name'
              )->distinct()->where('resolutions.id', '=', $id)
              ->where('agendas.agendable_type', '=', 'App\Models\Resolution')
              ->where('agendas.deleted_at', NULL)
           ->get();



        $documents = DB::table('documents')
           ->join('documentables', 'documentables.document_id', '=', 'documents.id')
           ->join('agendas', 'agendas.id', '=', 'documentables.documentable_id')
           ->join('resolutions', 'resolutions.id', '=', 'agendas.agendable_id')
           ->select(
            'documents.*',
            'agendas.id as agenda_id',
            'resolutions.id as resolution_id'
        )->where('resolutions.id', '=', $id)
        ->where('documentables.documentable_type', '=', 'App\Models\Agenda')
        ->where('documents.deleted_at', NULL)
     ->get();





       $notifications = DB::table('notifications')
            ->join('resolutions', 'resolutions.id', '=', 'notifications.notifiable_id')
            ->select(
                    'notifications.notification_date',
                    'resolutions.id',
                )->where('resolutions.id', '=', $id)
                ->where('notifications.notifiable_type', '=', 'App\Models\Resolution')

            ->get();

        return Inertia::render('Resolutions/Show',compact('resolution', 'organizers','agendas','notifications','groups','purposes','voters', 'users', 'documents', 'statuses'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reminders = Notification::where('notifiable_id',$id)
        ->where('notifiable_type','App\Models\Resolution')
        ->get();
        $resolution = Resolution::findOrFail($id);
        return Inertia::render('Resolutions/Edit',compact('resolution','reminders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resolution = Resolution::find($id);

        $created_by =  Auth::user()->id;

        $account = User::find($created_by)->account;

        DB::beginTransaction();

        $resolution->subject = $request->input('subject');
        $resolution->notes_to_voters  = $request->input('notes_to_voters');
        $resolution->voting_deadline = $request->input('voting_deadline');
        $resolution->save();


        // foreach ($request->input('reminders') as $day ) {

        //     if(isset($day['id'])){
        //         $notification = Notification::find($day['id']);

        //         $notification->notifiable_id = $resolution->id;
        //         $notification->notification_type_id = $day['notification_type_id'];
        //         $notification->reminder = $day['reminder'];
        //         $notification->created_by = $created_by;
        //         $notification->account_id = $account->id;
        //         $notification->notification_date = (new Carbon($resolution->voting_deadline))->subDays($day['reminder']);
        //         $notification->save();

        //     }else{
        //         $notification = Notification::create([
        //             'notifiable_id' => $resolution->id,
        //             'notifiable_type' => 'App\Models\Resolution',
        //             'notification_type_id' => 1,
        //             'reminder' => $day['reminder'],
        //             'created_by' => $created_by,
        //             'account_id' => $account->id,
        //             'notification_date'=> (new Carbon($resolution->voting_deadline))->subDays($day['reminder']),
        //         ]);
        //     }
        // }

        foreach ($request->input('reminders') as $day ) {
            if(isset($day['id'])){
                Notification::where('notifiable_id', $id)
                ->where('notifiable_type','App\Models\Resolution')->delete();
            }
        }


        $notifications = array();

        foreach ($request->input('reminders') as $day ) {

         $notification = new Notification;

         $notification->notification_type_id = 1;
         $notification->created_by = $created_by;
         $notification->account_id = $account->id;

         $notification->reminder = $day['reminder'];
         $notification->notification_date =  (new Carbon($resolution->voting_deadline))->subDays($day['reminder']);

         $resolution->notifications()->save($notification);

         array_push($notifications, $notification);

        }


        if (!$resolution  and !$notifications )
        {
            DB::rollBack();
            return redirect()->route('resolutions.index')
                        ->with('error','Something went wrong');
        }else{
            DB::commit();

            return redirect()->route('resolutions.index')
                    ->with('success','Resolution created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Resolution::where('id', $id)->delete();
        return redirect()->route('resolutions.index')
                        ->with('success','Resolution deleted successfully');
    }


    public function next(string $id)
    {
       $resolution = Resolution::findOrFail($id);

       $reminders = Notification::where('notifiable_id',$id)
          ->where('notifiable_type','App\Models\Resolution')
       ->get();




       return Inertia::render('Resolutions/Next',compact('resolution', 'reminders'));
    }



    public function status(Request $request, $id)
    {


        $resolution = Resolution::find($id);




        $participants = DB::table('participants')
        ->join('users', 'users.id', '=', 'participants.participant_id')
        ->select(
              'users.email',
              'users.title',
              'users.first_name',
              'users.last_name',
           )->where('participants.participantable_id', '=', $id)
           ->where('participants.participantable_type', '=', 'App\Models\Resolution')
        ->get();



        if ($request->input('status')== 2){

            $resolution->status = $request->input('status'); // published
            $resolution->save();

            foreach ($participants as $recipient){
                // Mail::to($recipient)->send(new ResolutionStarted($resolution));
                dispatch(new SendResolutionCirculatedEmailsJob($resolution, $recipient));
            }

        }else if ($request->input('status')== 3){

            $resolution->status = $request->input('status'); // start resolution
            $resolution->save();

            foreach ($participants as $recipient){
                // Mail::to($recipient)->send(new ResolutionClosed($resolution));
                dispatch(new SendResolutionStartedEmailsJob($resolution, $recipient));
            }
        }else if ($request->input('status')== 4){

            $resolution->status = $request->input('status'); // start resolution
            $resolution->save();

            foreach ($participants as $recipient){
                // Mail::to($recipient)->send(new ResolutionClosed($resolution));
                dispatch(new SendResolutionClosedEmailsJob($resolution, $recipient));
            }


        }else if ($request->input('status')== 1){


            $resolution->status = $request->input('status'); // start resolution
            $resolution->save();
        }
    }
}
