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
                ->where('notifications.deleted_at', NULL)
            ->get();

        return Inertia::render('Resolutions/Show',compact('resolution', 'organizers','agendas','notifications','groups','purposes','voters', 'users', 'documents', 'statuses'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resolution = Resolution::findOrFail($id);
        return Inertia::render('Resolutions/Edit',compact('resolution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resolution = Resolution::find($id);

        $resolution->title = $request->input('title');
        $resolution->resolution_type_id = $request->input('resolution_type_id');
        $resolution->venue = $request->input('venue');
        $resolution->google_map_url = $request->input('google_map_url');
        $resolution->timezone_id = $request->input('timezone_id');
        $resolution->description = $request->input('description');
        $resolution->participants_notes = $request->input('participants_notes');
        $resolution->organizer_notes = $request->input('organizer_notes');
        $resolution->status = $request->input('status');

        $resolution->save();

        return redirect()->route('resolutions.index')
                        ->with('success','Resolution updated successfully');
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
}
