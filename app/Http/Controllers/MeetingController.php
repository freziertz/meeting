<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Meeting;
use App\Models\User;
use App\Models\Organizer;
use App\Models\Participant;
use App\Models\Group;
use App\Models\MeetingRole;
use App\Models\Purpose;
use App\Models\MeetingType;
use App\Models\Schedule;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\StoreMeetingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;



use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

//Notification
use App\Notifications\MeetingPublishedNotification;

// Email
use Illuminate\Support\Facades\Mail;
use App\Mail\MeetingPublished;
use App\Mail\MeetingStarted;
use App\Mail\MeetingClosed;
use App\Jobs\SendMeetingStartedEmailsJob;
use App\Jobs\SendMeetingClosedEmailsJob;

use App\Jobs\SendMeetingPublishedEmailsJob;




class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $meetings = DB::table('meetings')
            ->join('schedules',  'meetings.id', 'schedules.meeting_id')
            ->select(
                'meetings.id',
                'meetings.title',
                'meetings.venue',
                'meetings.status',
                'schedules.meeting_date',
                'schedules.meeting_start_time',
                'schedules.meeting_end_time',
            )->where('schedules.primary', 1)
            ->get();

            return Inertia::render('Meetings/Index',compact('meetings'));
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

         $created_by =  Auth::user()->id;

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
                'reminder' => $request->input('reminder'),
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
                'account_id' => 1, // To do take it from Account
             ]);

                $primary = false;
            }


            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            $fontStyleName = 'oneUserDefinedStyle';
            $phpWord->addFontStyle($fontStyleName,
                array('name' => 'Tahoma', 'size' => 14, 'color' => '1B2232', 'bold' => true)
            );
            $text = $section->addText($meeting->title, $fontStyleName);
            $text = $section->addText($meeting->venue);


            // $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
            // $section->addImage("./images/prashant.jpg");

            //save as a word document

            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save('MeetingInfo.docx');

            //save as odf file

            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
            $objWriter->save('MeetingInfo.odt');

            //save as html file

            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('MeetingInfo.html');



            foreach ($request->input('reminders') as $day ) {
                 $notification = Notification::create([
                'meeting_id' => $meeting->id,
                'notification_type_id' => 1,
                'created_by' => $created_by,
                'account_id' => 1, // To do take it from Account
                'reminder' => $day['reminder'],
                'notification_date'=> (new Carbon($meeting_start_date))->subDays($day['reminder']),
             ]);
            }


            $organizer = Organizer::create([
                'meeting_id' => $meeting->id,
                'organizer_id' => $created_by,
                'created_by' => $created_by,
                'account_id' => 1, // To do take it from Account
                'title' => $request->input('organizer_title'), // TO DO add meeting organizer title in meeting create form
                'primary' => true,
             ]);




            if (!$meeting and !$schedule and !$notification and !$organizer)
            {
                DB::rollBack();
            }else{
                DB::commit();

                return redirect()->route('meetings.index')
                        ->with('success','Meeting created successfully.');
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
    public function show(string $id)
    {

        $users = User::all();

        $groups = Group::all();

        $meeting_roles = MeetingRole::all();

        $purposes = Purpose::all();

        $meeting = DB::table('meetings')
            ->join('meeting_types', 'meeting_types.id', '=', 'meetings.meeting_type_id')
            ->join('schedules', 'schedules.meeting_id', '=', 'meetings.id')
            ->select(
                'meetings.*',
                'meeting_types.name as meeting_type',
                'schedules.meeting_date',
                'schedules.meeting_start_time',
                'schedules.meeting_end_time'
            )->distinct()
            ->where('meetings.id', '=', $id)
            ->first();







        $organizers = DB::table('organizers')
                       ->join('meetings', 'meetings.id', '=', 'organizers.meeting_id')
                       ->join('users', 'users.id', '=', 'organizers.organizer_id')
                       ->select(
                             'organizers.primary',
                             'organizers.title as designation',
                             'organizers.id as organizer_id',
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',

                          )->where('meetings.id', '=', $id)
                       ->get();

        $participants = DB::table('participants')
                       ->join('meetings', 'meetings.id', '=', 'participants.meeting_id')
                       ->join('users', 'users.id', '=', 'participants.participant_id')
                       ->join('meeting_roles', 'meeting_roles.id', '=', 'participants.meeting_role_id')
                       ->join('groups', 'groups.id', '=', 'participants.group_id')
                       ->select(
                             'participants.meeting_role_id',
                             'participants.id as participant_id',
                             'participants.group_id',
                             'participants.title as designation',
                             'groups.name as group_name',
                             'meeting_roles.name as meeting_role_name',
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',

                          )->where('meetings.id', '=', $id)
                       ->get();

        $contributors = DB::table('contributors')
                   ->join('meetings', 'meetings.id', '=', 'contributors.meeting_id')
                   ->join('users', 'users.id', '=', 'contributors.contributor_id')
                   ->select(

                         'contributors.id as contributor_id',
                         'contributors.title as designation',
                          'users.first_name',
                          'users.middle_name',
                          'users.last_name',
                          'users.title as Title',

                      )->where('meetings.id', '=', $id)
                   ->get();


                   // DB::table('item')->select('item_name')->distinct()->get();



        $agendas = DB::table('agendas')
           ->join('meetings', 'meetings.id', '=', 'agendas.meeting_id')
           ->join('presenters', 'presenters.id', '=', 'agendas.presenter_id')
           ->join('users', 'users.id', '=', 'agendas.contributor_id')
           ->join('purposes', 'purposes.id', '=', 'agendas.purpose_id')

           ->select(
                  'agendas.*',
                  'presenters.presenter_id',
                  'presenters.pfirst_name',
                  'presenters.pmiddle_name',
                  'presenters.plast_name',
                  'users.first_name',
                  'users.middle_name',
                  'users.last_name',
                  'users.title as Title',
                  'purposes.name as purpose_name'
              )->distinct()->where('meetings.id', '=', $id)
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

       $notifications = DB::table('notifications')
       ->join('meetings', 'meetings.id', '=', 'notifications.meeting_id')
       ->select(
             'notifications.notification_date',
             'meetings.id',
          )->where('meetings.id', '=', $id)
       ->get();

         // dd($meeting);

        // $organizer = Meeting::find($meeting->id)->organizers;
         // $actions = Post::find($meeting->id)->actions;





        return Inertia::render('Meetings/Show',compact('meeting', 'organizers','agendas','notifications','schedules','groups','meeting_roles','purposes','participants','contributors', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $meeting = Meeting::findOrFail($id);
       $events = Schedule::where('meeting_id',$id)->get();
       $reminders = Notification::where('meeting_id',$id)->get();
       $meeting_types = MeetingType::get();



    //    dd($meeting);
    //    dd($events);
    //    dd($reminders);

       return Inertia::render('Meetings/Edit',compact('meeting', 'events','reminders','meeting_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // $request['user_id'] =  Auth::user()->id;



        $request['slug']= Str::of($request->input('title'))->slug('_');





        DB::beginTransaction();



        $meeting = Meeting::find($id);

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

        // dd($request->input('events'));

        foreach ($request->input('events') as $index => $event ) {




            if( $index == 0) {
                $meeting_start_date = $event['meeting_date'];
                $primary = true;
            }

            if(isset($event['id'])){

                $schedule = Schedule::find($event['id']);

                $schedule->meeting_id = $meeting->id;
                $schedule->meeting_start_time = $event['meeting_start_time'];
                $schedule->meeting_end_time = $event['meeting_end_time'];
                $schedule->primary = $primary;
                $schedule->save();
            }else{
                $schedule = $schedule = Schedule::create([
                    'meeting_id' => $meeting->id,
                    'meeting_date' => $event['meeting_date'],
                    'meeting_start_time' => $event['meeting_start_time'],
                    'meeting_end_time' => $event['meeting_end_time'],
                    'primary' => $primary,
                 ]);
            }

            $primary = false;
        }







        foreach ($request->input('reminders') as $day ) {

            if(isset($day['id'])){
                $notification = Notification::find($day['id']);

                $notification->meeting_id = $meeting->id;
                $notification->notification_type_id = $day['notification_type_id'];
                $notification->reminder = $day['reminder'];
                $notification->notification_date = (new Carbon($meeting_start_date))->subDays($day['reminder']);
                $notification->save();

            }else{
                $notification = Notification::create([
                    'meeting_id' => $meeting->id,
                    'notification_type_id' => 1,
                    'reminder' => $day['reminder'],
                    'notification_date'=> (new Carbon($meeting_start_date))->subDays($day['reminder']),
                ]);

            }




        }


        if (!$meeting and !$schedule and !$notification )
        {
            DB::rollBack();
        }else{
            DB::commit();

            return redirect()->route('meetings.index')
                    ->with('success','Meeting created successfully.');
        }


        return redirect()->route('meetings.index')
                        ->with('success','Meeting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TO DO delete everything see store
        DB::table("meetings")->where('id', $id)->delete();
        return redirect()->route('meetings.index')
                        ->with('success','Meeting deleted successfully');
    }



    public function status(Request $request, $id)
    {


        $meeting = Meeting::find($id);


        $participants = DB::table('participants')
        ->join('users', 'users.id', '=', 'participants.user_id')
        ->select(
              'users.email',
              'users.title',
              'users.first_name',
              'users.last_name',
           )->where('participants.meeting_id', '=', $id)
        ->get();

        if ($request->input('status')== 2){

            $meeting->status = $request->input('status'); // published
            $meeting->save();

            foreach ($participants as $recipient){
                // Mail::to($recipient)->send(new MeetingStarted($meeting));
                dispatch(new SendMeetingStartedEmailsJob($meeting, $recipient));
            }

        }else if ($request->input('status')== 3){

            $meeting->status = $request->input('status'); // start meeting
            $meeting->save();

            foreach ($participants as $recipient){
                // Mail::to($recipient)->send(new MeetingClosed($meeting));
                dispatch(new SendMeetingStartedEmailsJob($meeting, $recipient));
            }
        }else if ($request->input('status')== 4){

            $meeting->status = $request->input('status'); // start meeting
            $meeting->save();

            foreach ($participants as $recipient){
                // Mail::to($recipient)->send(new MeetingClosed($meeting));
                dispatch(new SendMeetingClosedEmailsJob($meeting, $recipient));
            }


        }else if ($request->input('status')== 1){

            $meeting->status = $request->input('status'); // start meeting
            $meeting->save();
        }
    }


}
