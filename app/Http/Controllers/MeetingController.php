<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Meeting;
use App\Models\User;
use App\Models\MeetingType;
use App\Models\Schedule;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\StoreMeetingRequest;
use Illuminate\Http\RedirectResponse;


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

         $request['user_id'] =  Auth::user()->id;

         DB::beginTransaction();
    

            $meeting = Meeting::create([
                'meeting_type_id' => $request->input('meeting_type_id'),
                'title' => $request->input('title'),
                'venue' => $request->input('venue'),
                'google_map_url' => $request->input('google_map_url'),               
                'timezone_id' => $request->input('timezone_id'),
                'description' => $request->input('description'),
                'participants_notes' => $request->input('participants_notes'),
                'organizer_notes' => $request->input('organizer_notes'),
                'reminder' => $request->input('reminder'),
                'status' => $request->input('status'),
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
             ]);

                $primary = false;
            }

    

            foreach ($request->input('reminders') as $day ) {
                 $notification = Notification::create([
                'meeting_id' => $meeting->id,
                'notification_type_id' => 1,
                'notification_date'=> (new Carbon($meeting_start_date))->subDays($day['reminder']),      
             ]);
            }


 

            if (!$meeting and !$schedule and !$notification)
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

        $meeting = DB::table('meetings')
            ->join('meeting_types', 'meeting_types.id', '=', 'meetings.meeting_type_id')
            ->join('schedules', 'schedules.meeting_id', '=', 'meetings.id')
            ->select(
                'meetings.*', 
                'meeting_types.name as meeting_type', 
                'schedules.*'
            )            
            ->where('meetings.id', '=', $id)
            ->first();


        $organizers = DB::table('organizers')
                       ->join('meetings', 'meetings.id', '=', 'organizers.meeting_id')
                       ->join('users', 'users.id', '=', 'organizers.user_id')
                       ->select(
                             'organizers.primary',
                             'organizers.title as designation',                            
                              'users.first_name',
                              'users.middle_name',
                              'users.last_name',
                              'users.title as Title',

                          )->where('meetings.id', '=', $id)
                       ->get();

        $contributors = DB::table('contributors')
                   ->join('meetings', 'meetings.id', '=', 'contributors.meeting_id')
                   ->join('users', 'users.id', '=', 'contributors.user_id')
                   ->select(
                         
                         'contributors.title as designation',                            
                          'users.first_name',
                          'users.middle_name',
                          'users.last_name',
                          'users.title as Title',

                      )->where('meetings.id', '=', $id)
                   ->get();



        $agendas = DB::table('agendas')
           ->join('meetings', 'meetings.id', '=', 'agendas.meeting_id')
           ->join('presenters', 'presenters.id', '=', 'agendas.presenter_id')
           ->join('users', 'users.id', '=', 'agendas.contributor_id')
           ->join('purposes', 'purposes.id', '=', 'agendas.purpose_id')
         
           ->select(                 
                  'agendas.*',
                  'presenters.*',
                  'users.*',
                  'purposes.name as purpose_name'
              )->where('meetings.id', '=', $id)
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



        return Inertia::render('Meetings/Show',compact('meeting', 'organizers','agendas','notifications','schedules','contributors', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $meeting = Meeting::findOrFail($id);
       return Inertia::render('Meetings/Edit',compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

       
        $meeting = Meeting::find($id);     

        $meeting->title = $request->input('title');
        $meeting->meeting_type_id = $request->input('meeting_type_id');
        $meeting->venue = $request->input('venue');
        $meeting->google_map_url = $request->input('google_map_url');
        $meeting->timezone_id = $request->input('timezone_id');
        $meeting->description = $request->input('description');
        $meeting->participants_notes = $request->input('participants_notes');
        $meeting->organizer_notes = $request->input('organizer_notes');
        $meeting->status = $request->input('status'); 

        $meeting->save();        

        return redirect()->route('meetings.index')
                        ->with('success','Meeting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("meetings")->where('id', $id)->delete();
        return redirect()->route('meetings.index')
                        ->with('success','Meeting deleted successfully');
    }


    public function publish(Request $request, $id)
    {  


        $meeting = Meeting::find($id);    

 
        $meeting->status = $request->input('status'); // published
        $meeting->save();        

        return redirect()->back()
                        ->with('success','Meeting published successfully');



    }



}
