<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Meeting;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Organizer;
use App\Models\Document;
use App\Models\Participant;
use App\Models\Group;
use App\Models\ActionStatus;
use App\Models\MeetingRole;
use App\Models\Purpose;
use App\Models\MeetingType;
use App\Models\Schedule;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as Req;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\StoreMeetingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

use App\Traits\InteractsWithBanner;
use App\Enums\MeetingStatusEnum;



use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

//Reminder
use App\Notifications\MeetingPublishedNotification;

// Email
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingPublished;
use App\Mail\MeetingStarted;
use App\Mail\MeetingClosed;
use App\Jobs\SendMeetingStartedEmailsJob;
use App\Jobs\SendMeetingClosedEmailsJob;

use App\Jobs\SendMeetingPublishedEmailsJob;
use App\Models\Contributor;

use function PHPUnit\Framework\isNull;

class MeetingController extends Controller
{
    use InteractsWithBanner;
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // $this->middleware(['role:Users','permission:create meetings|list meetings|edit meetings']);
        // $this->middleware(['role:users','permission:create meetings|list meetings|edit meetings']);

        // $this->middleware('permission:meeting-list|meeting-create|meeting-edit|meeting-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:meeting-create', ['only' => ['create','store']]);
        // $this->middleware('permission:meeting-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:meeting-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

           $all_meetings = DB::table('meetings')
            ->join('schedules',  'meetings.id', 'schedules.meeting_id')
            ->select(
                'meetings.id',
                'meetings.title',
                'meetings.venue',
                'meetings.visible',
                'meetings.status',
                'schedules.meeting_date',
                'schedules.meeting_start_time',
                'schedules.meeting_end_time',
                'meetings.created_by',
            )->where('schedules.primary', 1)
            ->get();

           

        $meeting_ids = [];


        foreach ($all_meetings as $particular_meeting){


            $meeting = Meeting::findOrFail($particular_meeting->id);

         


            // dd($request->user()->can('participate', $meeting));

            if (($request->user()->can('viewAny', Meeting::class))
            &&

                (
                    ($request->user()->can('own', $meeting)) ||

                ($request->user()->can('organize', $meeting))
                    ||

                    ($request->user()->can('participate', $meeting)

                && $meeting->visible == true)))

                {
                    array_push($meeting_ids, $particular_meeting->id);
                }
        }

       

        // $meetings = Meeting::query()
        //         ->whereIn('meetings.id',$meeting_ids)
        //          ->join('schedules',  'meetings.id', 'schedules.meeting_id')->get();

        //          dd($meetings);



        return Inertia::render('Meetings/Index',  [
            'filters' => Req::all('search', 'role', 'trashed'),
            'can' => ['create_meeting' => $request->user()->can('create', Meeting::class)],

            'meetings' => Meeting::query()
          
             
                ->whereIn('meetings.id',$meeting_ids)
                 ->join('schedules',  'meetings.id', 'schedules.meeting_id')
                 ->where('schedules.primary', 1)
                ->orderByName()
                ->filter(Req::only('search', 'trashed'))
                ->paginate(10)
                
                ->withQueryString()
                ->through(fn ($meeting) => [
                    'id' => $meeting->meeting_id,
                    'title' => $meeting->title,
                    'venue' => $meeting->venue,
                    'visible' => $meeting->visible,
                    'status' => $meeting->status,
                    'created_by' => $meeting->created_by,
                    'deleted_at' => $meeting->deleted_at,
                    'meeting_date' => $meeting->meeting_date,
                    'meeting_start_time' => $meeting->meeting_start_time,
                    'meeting_end_time' =>$meeting->meeting_end_time
                ]),


        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $meeting_types = MeetingType::get();

        return Inertia::render('Meetings/Create', compact('meeting_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeetingRequest $request) : RedirectResponse
    {

        if ($request->user()->cannot('create', Meeting::class)) {
            abort(403);
        }

         $created_by =  Auth::user()->id;

         $account = User::find($created_by)->account;

         $request['slug']= Str::of($request->input('title'))->slug('_');

         $request['uuid'] = (string) Str::uuid();

         $request['visible'] = false;



         DB::beginTransaction();


            $meeting = Meeting::create([
                'meeting_type_id' => $request->input('meeting_type_id'),
                'title' => $request->input('title'),
                'uuid' => $request->input('uuid'),
                'created_by' => $created_by,
                'account_id' => 1, // To do take it from Account
                'venue' => $request->input('venue'),
                'user_id' => $request->input('user_id'),
                'google_map_url' => $request->input('google_map_url'),
                'timezone_id' => $request->input('timezone_id'),
                'description' => $request->input('description'),
                'participants_notes' => $request->input('participants_notes'),
                'organizer_notes' => $request->input('organizer_notes'),
                // 'reminder' => $request->input('reminder'),
                'status' => $request->input('status'),
                'slug' => $request->input('slug'),
                'visible' => $request->input('visible'),  // Once published is visible to participant
            ]);


            foreach ($request->input('events') as $index => $event ) {

                if( $index == 0) {
                    $meeting_start_date = $event['meeting_date'];
                    $primary = true;
                }

            $schedule = $schedule = Schedule::create([
                'meeting_id' => $meeting->id,
                'meeting_date' => $event['meeting_date'],
                'meeting_start_time' => $event['meeting_start_time'],
                'meeting_end_time' => $event['meeting_end_time'],
                'primary' => $primary,
                'created_by' => $created_by,
                'account_id' => $account->id,
             ]);

                $primary = false;
            }


            // $phpWord = new PhpWord();
            // $section = $phpWord->addSection();

            // $fontStyleName = 'oneUserDefinedStyle';
            // $phpWord->addFontStyle($fontStyleName,
            //     array('name' => 'Tahoma', 'size' => 14, 'color' => '1B2232', 'bold' => true)
            // );
            // $text = $section->addText($meeting->title, $fontStyleName);
            // $text = $section->addText($meeting->venue);


            // // $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
            // // $section->addImage("./images/prashant.jpg");

            // //save as a word document

            // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            // $objWriter->save('MeetingInfo.docx');

            // //save as odf file

            // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
            // $objWriter->save('MeetingInfo.odt');

            // //save as html file

            // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            // $objWriter->save('MeetingInfo.html');

            $reminders = array();

            foreach ($request->input('reminders') as $day ) {

             $reminder = new Reminder;

             $reminder->reminder_type_id = 1;
             $reminder->created_by = $created_by;
             $reminder->account_id = $account->id;

             $reminder->reminder = $day['reminder'];
             $reminder->reminder_date =  (new Carbon($meeting_start_date))->subDays($day['reminder']);

             $meeting->reminders()->save($reminder);

             array_push($reminders, $reminder);

            }



            $organizer = new Organizer;

            $organizer->organizer_id = $created_by;
            $organizer->created_by = $created_by;
            $organizer->account_id = $account->id;
            $organizer->title = $request->input('organizer_title');
            $organizer->primary = true;
            $organizer->visible = true;


            $meeting->organizers()->save($organizer);

            // For creation from existing one

            $include_organizers = $request['organizers'];
            $include_contributors = $request['contributors'];
            $include_agendas = $request['agendas'];
            $include_participants = $request['participants'];
            $old_meeting_id = $request['old_meeting_id'];


            if($include_organizers){

                $old_organizers = Organizer::where('organizable_id', $old_meeting_id)
                ->where('organizable_type', 'App\Models\Meeting')
                ->where('deleted_at', NULL)
                ->get();

                foreach($old_organizers as $old_organizer){

                $organizer_exist = Organizer::where('organizable_id', $meeting->id )
                    ->where('organizer_id', $old_organizer->organizer_id)
                    ->where('organizable_type', 'App\Models\Meeting')
                    ->where('deleted_at', NULL)
                   ->first();


                 if (is_null($organizer_exist)) {

                    $organizer = $old_organizer->replicate();
                    $organizer->created_by = $created_by;
                    $organizer->account_id = $account->id;

                    $meeting->organizers()->save($organizer);
                  }
                }
            }

            if($include_contributors){

                $old_contributors = Contributor::where('contributable_id', $old_meeting_id)
                ->where('contributable_type', 'App\Models\Meeting')
                ->where('deleted_at', NULL)
                ->get();

                foreach($old_contributors as $old_contributor){

                $contributor_exist = Contributor::where('contributable_id', $meeting->id )
                    ->where('contributor_id', $old_contributor->contributor_id)
                    ->where('contributable_type', 'App\Models\Meeting')
                    ->where('deleted_at', NULL)
                   ->first();


                 if (is_null($contributor_exist)) {

                    $contributor = $old_contributor->replicate();
                    $contributor->created_by = $created_by;
                    $contributor->account_id = $account->id;

                    $meeting->contributors()->save($contributor);
                  }
                }
            }

            if($include_participants){

                $old_participants = Participant::where('participantable_id', $old_meeting_id)
                ->where('participantable_type', 'App\Models\Meeting')
                ->where('deleted_at', NULL)
                ->get();

                foreach($old_participants as $old_participant){

                $participant_exist = Participant::where('participantable_id', $meeting->id )
                    ->where('participant_id', $old_participant->participant_id)
                    ->where('participantable_type', 'App\Models\Meeting')
                    ->where('deleted_at', NULL)
                   ->first();


                 if (is_null($participant_exist)) {

                    $participant = $old_participant->replicate();
                    $participant->created_by = $created_by;
                    $participant->account_id = $account->id;

                    $meeting->participants()->save($participant);
                  }
                }
            }

            if($include_agendas){

                $old_agendas = Agenda::where('agendable_id', $old_meeting_id)
                ->where('agendable_type', 'App\Models\Meeting')
                ->where('deleted_at', NULL)
                ->get();

                foreach($old_agendas as $old_agenda){

                    $agenda = $old_agenda->replicate();
                    $agenda->created_by = $created_by;
                    $agenda->account_id = $account->id;

                    $meeting->agendas()->save($agenda);
                }
            }




            if (!$meeting and !$schedule and !$reminders and !$organizer)
            {
                DB::rollBack();
            }else{
                DB::commit();

                // session()->flash('flash.banner', 'Meeting created successfully!');
                // session()->flash('flash.bannerStyle', 'success');

                $this->banner('Meeting created successfully!');

                return redirect()->route('meetings.index');

            }








             // insert list of reminder
             // insert list of schedule
             // insert organiser
             // insert participants
             // insert of contributor





        // return redirect()->route('meetings.index')
        //                 ->with('success','Meeting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {

        $users = User::all();

        // dd($id);


        $user = User::find(Auth::user()->id);



        $groups = Group::all();

        $meeting_roles = MeetingRole::all();

        $purposes = Purpose::all();

        $statuses = ActionStatus::all();

        $meeting = DB::table('meetings')
            // ->join('meeting_types', 'meeting_types.id', '=', 'meetings.meeting_type_id')
            ->join('schedules', 'schedules.meeting_id', '=', 'meetings.id')
            ->select(
                'meetings.*',
                // 'meeting_types.name as meeting_type',
                'schedules.meeting_date',
                'schedules.meeting_start_time',
                'schedules.meeting_end_time'
            )->distinct()
            ->where('meetings.id', '=', $id)
            ->where('meetings.deleted_at', NULL)
            ->first();        



            // if (
            //     // ($request->user()->cannot('view', $meeting_accessed) ||
            //     // (($request->user()->cannot('own', $meeting_accessed)) ||
            //     // ($request->user()->cannot('organize', $meeting_accessed)) ||
            //     ($request->user()->cannot('participate', $meeting_accessed))
            //     )
            //     // ))
            //     // ||
            //     // ($request->user()->cannot('participate', $meeting_accessed) || $meeting_accessed->status =! 2))))
            //     {
            //         abort(403);
            //     }




        $organizers = DB::table('organizers')
                       ->join('meetings', 'meetings.id', '=', 'organizers.organizable_id')
                       ->join('users', 'users.id', '=', 'organizers.organizer_id')
                       ->select(
                             'organizers.id',
                             'organizers.primary',
                             'organizers.title as designation',
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',

                          )->where('meetings.id', '=', $id)
                          ->where('organizers.organizable_type', '=', 'App\Models\Meeting')
                          ->where('organizers.deleted_at', NULL)
                          ->where('organizers.visible', true)
                       ->get();



        $participants = DB::table('participants')
                       ->join('meetings', 'meetings.id', '=', 'participants.participantable_id')
                       ->join('users', 'users.id', '=', 'participants.participant_id')
                       ->join('meeting_roles', 'meeting_roles.id', '=', 'participants.meeting_role_id')
                       ->join('groups', 'groups.id', '=', 'participants.group_id')
                       ->select(
                             'participants.id',
                             'participants.meeting_role_id',
                             'participants.group_id',
                             'participants.title as designation',
                             'groups.name as group_name',
                             'meeting_roles.name as meeting_role_name',
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',
                          )->where('meetings.id', '=', $id)
                          ->where('participants.participantable_type', '=', 'App\Models\Meeting')
                          ->where('participants.deleted_at', NULL)
                       ->get();



        $contributors = DB::table('contributors')
                   ->join('meetings', 'meetings.id', '=', 'contributors.contributable_id')
                   ->join('users', 'users.id', '=', 'contributors.contributor_id')
                   ->select(
                         'contributors.id',
                         'contributors.title as designation',
                          'users.first_name',
                          'users.middle_name',
                          'users.last_name',
                          'users.title as Title',
                      )->where('meetings.id', '=', $id)
                      ->where('contributors.contributable_type', '=', 'App\Models\Meeting')
                      ->where('contributors.deleted_at', NULL)
                   ->get();




                   // DB::table('item')->select('item_name')->distinct()->get();



        $agendas = DB::table('agendas')
           ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
        //    ->join('presenters', 'presenter_id', '=', 'agendas.presenter_id')
        //    ->join('contributor', 'contributor_id', '=', 'agenda.contributor_id')
           ->join('users as presenters', 'presenters.id', '=', 'agendas.presenter_id')
           ->join('users', 'users.id', '=', 'agendas.contributor_id')
           ->join('purposes', 'purposes.id', '=', 'agendas.purpose_id')

           ->select(
                  'agendas.*',
                  'presenters.id as presenter_id',
                  'presenters.first_name as pfirst_name',
                  'presenters.middle_name as pmiddle_name',
                  'presenters.last_name as plast_name',
                  'users.first_name',
                  'users.middle_name',
                  'users.last_name',
                  'users.title as Title',
                  'purposes.name as purpose_name'
              )->distinct()->where('meetings.id', '=', $id)
              ->where('agendas.agendable_type', '=', 'App\Models\Meeting')
              ->where('agendas.deleted_at', NULL)
           ->get();


      $votes = DB::table('votes')
         ->where('votes.meeting_id', $id)
         ->get();





        $documents = DB::table('documents')
           ->join('documentables', 'documentables.document_id', '=', 'documents.id')
           ->join('agendas', 'agendas.id', '=', 'documentables.documentable_id')
           ->join('meetings', 'meetings.id', '=', 'agendas.agendable_id')
           ->select(
            'documents.*',
            'agendas.id as agenda_id',
            'meetings.id as meeting_id'
        )->where('meetings.id', '=', $id)
        ->where('documentables.documentable_type', '=', 'App\Models\Agenda')
        ->where('documents.deleted_at', NULL)
     ->get();




        $schedules = DB::table('schedules')
           ->join('meetings', 'meetings.id', '=', 'schedules.meeting_id')
           ->select(
                 'schedules.id',
                 'schedules.meeting_date',
                 'schedules.meeting_start_time',
                 'schedules.meeting_end_time',
                 'meetings.id',
              )->where('meetings.id', '=', $id)

           ->get();

       $reminders = DB::table('reminders')
            ->join('meetings', 'meetings.id', '=', 'reminders.reminderable_id')
            ->select(
                    'reminders.reminder_date',
                    'meetings.id',
                )->where('meetings.id', '=', $id)
                ->where('reminders.reminderable_type', '=', 'App\Models\Meeting')

            ->get();

        $actions = DB::table('actions')
            ->join('meetings', 'meetings.id', '=', 'actions.meeting_id')
            // ->join('users', 'users.id', '=', 'actions.actioner_id')
            ->select(
                    'actions.*',
                )->where('meetings.id', '=', $id)
                ->where('actions.deleted_at', NULL)
            ->get();


            $mt = Meeting::find($meeting->id);

            $can = [
                'create_organizer' => $request->user()->can('create', Organizer::class),
                'edit_organizer' => $request->user()->can('edit', Organizer::class),
                'list_organizer' => $request->user()->can('list', Organizer::class),
                'delete_organizer' => $request->user()->can('delete', $organizers),

                'create_agenda' => $request->user()->can('create', Agenda::class),
                'edit_agenda' => $request->user()->can('edit', Agenda::class),
                'list_agenda' => $request->user()->can('list', Agenda::class),
                'delete_agenda' => $request->user()->can('delete', $agendas),


                'create_participant' => $request->user()->can('create', Participant::class),
                'edit_participant' => $request->user()->can('edit', Participant::class),
                'list_participant' => $request->user()->can('list', Participant::class),
                'delete_participant' => $request->user()->can('delete', $participants),

                'create_action' => $request->user()->can('create', Action::class),
                'edit_action' => $request->user()->can('edit', Action::class),
                'list_action' => $request->user()->can('list', Action::class),
                'delete_action' => $request->user()->can('delete', $actions),

                'create_meeting' => $request->user()->can('create', Meeting::class),
                'edit_meeting' => $request->user()->can('update', $mt),
                'list_meeting' => $request->user()->can('viewAny', Meeting::class),
                'delete_meeting' => $request->user()->can('delete', $mt),

                'publish_meeting' => $request->user()->can('publish', $mt),
                'start_meeting' => $request->user()->can('start', $mt),
                'close_meeting' => $request->user()->can('close', $mt),
                'pause_meeting' => $request->user()->can('pause', $mt),
                'reset_meeting' => $request->user()->can('reset', $mt),

                'download_files' => $request->user()->can('participate', $mt),
                'send_meeting_pack' => $request->user()->can('organize', $mt),
                'export_meeting_pack' => $request->user()->can('organize', $mt),
                'send_meeting_minutes' => $request->user()->can('organize', $mt),
                'export_meeting_minutes' => $request->user()->can('organize', $mt),

                'organize_meeting' => $request->user()->can('organize', $mt),

                'participate_meeting' => $request->user()->can('participate', $mt),

                'contribute_meeting' => $request->user()->can('contribute', $mt),

                'send_reminder' => $request->user()->can('organize', $mt),
                'view_delivery_status' => $request->user()->can('organize', $mt),
                'add_vote' => $request->user()->can('organizeMeeting', $mt),
                'manage_action' => $request->user()->can('organizeMeeting', $mt),
            ];

            // dd($can['publish_meeting']);

            // dd($user->hasPermissionTo('edit meetings'));

            // $user->assignRole('Chairperson', );




            $meeting_accessed = Meeting::find($id);


            if (($request->user()->can('viewAny', $meeting_accessed)) &&

            (($request->user()->can('own', $meeting_accessed)) ||

            ($request->user()->can('organize', $meeting_accessed)) ||

            ($request->user()->can('participate', $meeting_accessed) && $meeting_accessed->visible == true)) )
            {
                // array_push($meetings, $meeting);
                return Inertia::render('Meetings/Show',compact('meeting', 'organizers','agendas','reminders','schedules','groups','meeting_roles','purposes','participants','contributors', 'users', 'documents', 'statuses', 'actions','votes', 'can'));

            }else{
                abort(403);

            }



        // return Inertia::render('Meetings/Show',compact('meeting', 'organizers','agendas','reminders','schedules','groups','meeting_roles','purposes','participants','contributors', 'users', 'documents', 'statuses', 'actions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {




       $meeting = Meeting::findOrFail($id);

    //    if ($request->user()->cannot('organized', $meeting) )
    //    {
    //        abort(403);
    //    }

       $events = Schedule::where('meeting_id',$id)->get();

       $reminders = Reminder::where('reminderable_id',$id)
       ->where('reminderable_type','App\Models\Meeting')

       ->get();

       $meeting_types = MeetingType::get();

       if (($request->user()->can('update', $meeting)) &&

            (($request->user()->can('own', $meeting)) ||

            ($request->user()->can('organize', $meeting))))
            {
                return Inertia::render('Meetings/Edit',compact('meeting', 'events','reminders','meeting_types'));

            }else{
                abort(403);

            }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // $request['user_id'] =  Auth::user()->id;
        $meeting = Meeting::find($id);

        if ($request->user()->cannot('update', $meeting)) {
            abort(403);
        }

        $created_by =  Auth::user()->id;

        $account = User::find($created_by)->account;



        $request['slug']= Str::of($request->input('title'))->slug('_');





        DB::beginTransaction();





        $meeting->title = $request->input('title');
        $meeting->meeting_type_id = $request->input('meeting_type_id');
        $meeting->venue = $request->input('venue');
        $meeting->google_map_url = $request->input('google_map_url');
        $meeting->timezone_id = $request->input('timezone_id');
        $meeting->description = $request->input('description');
        $meeting->participants_notes = $request->input('participants_notes');
        $meeting->organizer_notes = $request->input('organizer_notes');
        $meeting->slug = $request->input('slug');


        $meeting->save();



        foreach ($request->input('events') as $index => $event ) {

            if(isset($event['id'])){
                Schedule::where('meeting_id', $id)->delete();
            }
        }



        foreach ($request->input('events') as $index => $event ) {

            if( $index == 0) {
                $meeting_start_date = $event['meeting_date'];
                $primary = true;
            }

        $schedule = $schedule = Schedule::create([
            'meeting_id' => $meeting->id,
            'meeting_date' => $event['meeting_date'],
            'meeting_start_time' => $event['meeting_start_time'],
            'meeting_end_time' => $event['meeting_end_time'],
            'primary' => $primary,
            'created_by' => $created_by,
            'account_id' => $account->id,
         ]);

            $primary = false;
        }


        foreach ($request->input('reminders') as $day ) {
            if(isset($day['id'])){
                Reminder::where('reminderable_id', $id)
                ->where('reminderable_type','App\Models\Meeting')->delete();
            }
        }


        $reminders = array();

        foreach ($request->input('reminders') as $day ) {

         $reminder = new Reminder;

         $reminder->reminder_type_id = 1;
         $reminder->created_by = $created_by;
         $reminder->account_id = $account->id;

         $reminder->reminder = $day['reminder'];
         $reminder->reminder_date =  (new Carbon($meeting_start_date))->subDays($day['reminder']);

         $meeting->reminders()->save($reminder);

         array_push($reminders, $reminder);

        }


        if (!$meeting and !$schedule and !$reminders)
        {
            DB::rollBack();
            return redirect()->route('meetings.index')
                        ->with('error','Something went wrong');
        }else{
            DB::commit();

            return redirect()->route('meetings.index')
                    ->with('success','Meeting created successfully.');
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TO DO delete everything see store
        DB::beginTransaction();
           $meeting = Meeting::find($id)->delete();


           $organizers = Organizer::where('organizable_id', $id)->delete();
           $contributors = Contributor::where('contributable_id', $id)->delete();
           $participants = Participant::where('participantable_id', $id)->delete();
           $agendas = Agenda::where('agendable_id', $id)->delete();
            //$actions = Action::where('actionable_id', $id)->delete(); // through agenda
           $reminders = Reminder::where('reminderable_id', $id)->delete();
           $schedules = Schedule::where('meeting_id', $id)->delete();

        if (!$meeting and !$schedules and !$reminders and !$organizers and !$contributors and !$participants and !$agendas )
        {
            DB::rollBack();
        }else{
            DB::commit();

            return redirect()->route('meetings.index')
                    ->with('success','Meeting created successfully.');
        }

        return redirect()->route('meetings.index')
                        ->with('success','Meeting deleted successfully');
    }

    public function next(string $id)
    {
       $meeting = Meeting::findOrFail($id);

       $events = Schedule::where('meeting_id',$id)->get();

       $reminders = Reminder::where('reminderable_id',$id)
          ->where('reminderable_type','App\Models\Meeting')
       ->get();


       $meeting_types = MeetingType::get();

       return Inertia::render('Meetings/Next',compact('meeting', 'events','reminders','meeting_types'));
    }

    public function publish(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        $participants = DB::table('participants')
        ->join('users', 'users.id', '=', 'participants.participant_id')
        ->select(
              'users.email',
              'users.title',
              'users.first_name',
              'users.last_name',
           )->where('participants.participantable_id', '=', $id)
           ->where('participants.participantable_type', '=', 'App\Models\Meeting')
        ->get();

        $meeting->status = MeetingStatusEnum::Published;
        $meeting->visible = true;
        $meeting->save();

        foreach ($participants as $recipient){
            dispatch(new SendMeetingPublishedEmailsJob($meeting, $recipient));
        }
    }

    public function start(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        $participants = DB::table('participants')
        ->join('users', 'users.id', '=', 'participants.participant_id')
        ->select(
              'users.email',
              'users.title',
              'users.first_name',
              'users.last_name',
           )->where('participants.participantable_id', '=', $id)
           ->where('participants.participantable_type', '=', 'App\Models\Meeting')
        ->get();

        $meeting->status = MeetingStatusEnum::Started;
        $meeting->save();

        foreach ($participants as $recipient){
            dispatch(new SendMeetingStartedEmailsJob($meeting, $recipient));
        }
    }

    public function close(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        $participants = DB::table('participants')
        ->join('users', 'users.id', '=', 'participants.participant_id')
        ->select(
              'users.email',
              'users.title',
              'users.first_name',
              'users.last_name',
           )->where('participants.participantable_id', '=', $id)
           ->where('participants.participantable_type', '=', 'App\Models\Meeting')
        ->get();

        $meeting->status = MeetingStatusEnum::Closed;
        $meeting->save();

        foreach ($participants as $recipient){
            dispatch(new SendMeetingClosedEmailsJob($meeting, $recipient));
        }
    }

    public function reset(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        $meeting->status = MeetingStatusEnum::Draft; // Reset
        $meeting->visible = false;
        $meeting->save();

    }

    public function exportMeetingPack(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        // dispatch(new exportMeetingPackJob($meeting));
    }

    public function sendMeetingPack(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        // dispatch(new sendMeetingPackJob($meeting));
    }

    public function exportMeetingMinutes(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        // dispatch(new exportMeetingMinutesJob($meeting));
    }

    public function sendMeetingMinutes(Request $request, $id)
    {
        $meeting = Meeting::find($id);

        // dispatch(new sendMeetingPackJob($meeting));
    }




    // public function status(Request $request, $id)
    // {


    //     $meeting = Meeting::find($id);




    //     $participants = DB::table('participants')
    //     ->join('users', 'users.id', '=', 'participants.participant_id')
    //     ->select(
    //           'users.email',
    //           'users.title',
    //           'users.first_name',
    //           'users.last_name',
    //        )->where('participants.participantable_id', '=', $id)
    //        ->where('participants.participantable_type', '=', 'App\Models\Meeting')
    //     ->get();



    //     if ($request->input('status')== 2){

    //         $meeting->status = $request->input('status'); // published
    //         $meeting->save();

    //         foreach ($participants as $recipient){
    //             // Mail::to($recipient)->send(new MeetingStarted($meeting));
    //             dispatch(new SendMeetingPublishedEmailsJob($meeting, $recipient));
    //         }

    //     }else if ($request->input('status')== 3){

    //         $meeting->status = $request->input('status'); // start meeting
    //         $meeting->save();

    //         foreach ($participants as $recipient){
    //             // Mail::to($recipient)->send(new MeetingClosed($meeting));
    //             dispatch(new SendMeetingStartedEmailsJob($meeting, $recipient));
    //         }
    //     }else if ($request->input('status')== 4){

    //         $meeting->status = $request->input('status'); // start meeting
    //         $meeting->save();

    //         foreach ($participants as $recipient){
    //             // Mail::to($recipient)->send(new MeetingClosed($meeting));
    //             dispatch(new SendMeetingClosedEmailsJob($meeting, $recipient));
    //         }


    //     }else if ($request->input('status')== 1){


    //         $meeting->status = $request->input('status'); // start meeting
    //         $meeting->save();
    //     }
    // }


}
