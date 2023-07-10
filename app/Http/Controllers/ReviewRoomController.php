<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Meeting;
use App\Models\ReviewRoom;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Req;

class ReviewRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $review_rooms = Meeting::where('status', 2)->get();
        // return Inertia::render('ReviewRooms/Index',compact('review_rooms'));

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



    return Inertia::render('ReviewRooms/Index',  [
        'filters' => Req::all('search', 'role', 'trashed'),
        'can' => ['create_meeting' => $request->user()->can('create', Meeting::class)],

        'meetings' => Meeting::query()
            ->whereIn('meetings.id',$meeting_ids)
            ->where('meetings.status', 2 )
             ->join('schedules',  'meetings.id', 'schedules.meeting_id')
            ->orderByName()
            ->filter(Req::only('search', 'trashed'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($meeting) => [
                'id' => $meeting->id,
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
        return Inertia::render('ReviewRooms/Create');
    }


    public function agendas(string $id)
    {

        $meeting = Meeting::find($id);




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




       // array_push($meetings, $meeting);
       return Inertia::render('ReviewRooms/Agenda',compact('documents','agendas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        ReviewRoom::create($request->all());

        return redirect()->route('review_rooms.index')
                        ->with('success','Review Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $document = Document::findOrFail($id);
        // return Inertia::render('Documents/Show',compact('document'));
        // $review_room = ReviewRoom::findOrFail($id);
        return Inertia::render('ReviewRooms/Show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review_room = ReviewRoom::findOrFail($id);
        return Inertia::render('ReviewRooms/Show',compact('review_room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReviewRoom $reviewRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ReviewRoom::where('id', $id)->delete();

        return redirect()->route('review_rooms.index')
                        ->with('success','Review Room deleted successfully');
    }
}
