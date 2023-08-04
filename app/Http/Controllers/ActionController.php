<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\User;
use App\Models\Reminder;
use App\Models\ActionStatus;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreActionRequest;
use App\Models\ActionHistory;
use Inertia\Inertia;
Use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class ActionController extends Controller
{

    public $meeting;


    function __constructor($meeting)
    {
        $this->meeting = $meeting;
    }
    /**
     * Display a listing of the resource.
     */
    // private function company()
    // {
    //   $user = User::find(auth()->user()->id);

    //   return Company::find($user->company_id);
    // }

    public function index()
    {
        $actions = Action::all();

        // dd($actions);
        // $actions = Action::find($meeting_id)->actions;
        return Inertia::render('Actions/Index', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = ActionStatus::all();
        return Inertia::render('Actions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['created_by'] =  Auth::user()->id;

        $created_by =  $request['created_by'];

        $action_due_date = $request['due_date'];

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        $meeting = Meeting::find($request->meeting_id);


        DB::beginTransaction();

        $action = Action::create($request->all());


        foreach ($request->input('reminders') as $day ) {

                $reminder = new Reminder;

                $reminder->reminderable_id = $action->id;
                $reminder->reminder_type_id = 1;
                $reminder->account_id = $account->id;
                $reminder->created_by = $created_by;
                $reminder->reminder = $day['reminder'] ? $day['reminder'] : 1 ;
                $reminder->reminder_date = (new Carbon($action_due_date))->subDays($reminder->reminder);

                $action->reminders()->save($reminder);


            }

            foreach ($request->input('actioners') as $actioner ) {

            $participant_exist = Participant::where(
                'participantable_id', $action->id)
                 ->where('participant_id', $actioner['actioner_id'])
                 ->where('participantable_type','App\Models\Action')
              ->first();

                if (is_null($participant_exist)) {

                $participant = new Participant;

                $participant->participant_id = $actioner['actioner_id'];
                $participant->created_by = $created_by;
                $participant->account_id = $account->id;
                $participant->title = $request->input('title');
                $participant->meeting_role_id = $request->input('meeting_role_id');
                $participant->group_id = $request->input('group_id');

                $action->participants()->save($participant);
                }
            }








            $action_history = new ActionHistory();

            $action_history->action_id = $action->id;
            $action_history->status_id = $request->input('status_id') ? $request->input('status_id') : 999;
            $action_history->notes = $request->input('notes') ? $request->input('notes') : 'New';
            $action_history->as_of_date = $request->input('as_of_date') ? $request->input('as_of_date') : Carbon::now()->format('Y-m-d');

            $action_history->created_by = $created_by;
            $action_history->account_id = $account->id;


            $action_history->save();





            if (!$action and !$reminder and !$participant and !$action_history) // add participant
            {
                DB::rollBack();
            }else{
                DB::commit();

                // return redirect()->route('meetings.show',compact('meeting'))
                //         ->with('success','Action created successfully.');
            }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $action = Action::findOrFail($id);
        return Inertia::render('Actions/Show',compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $action = Action::findOrFail($id);
       return Inertia::render('Actions/Edit',compact('action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreActionRequest $request, string $id)
    {

        $created_by =  Auth::user()->id;
        $account = User::find($created_by)->account;

        $action = Action::find($id);



        $action->agender_id = $request->input('agender_id');
        $action->name = $request->input('name');
        $action->actioner_id = $request->input('actioner_id');
        $action->due_date = $request->input('due_date');
        $action->days = $request->input('days');
        $action->status = $request->input('status');
        $action->as_off = $request->input('as_off');
        // $action->created_by = $created_by;
        // $action->account_id = $account->id;

        $action->save();

        return redirect()->route('actions.index')
                        ->with('success','Action updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        $action = Action::where('id', $id)->delete();
        $action_history = ActionHistory::where('action_id', $id)->delete();

        if (!$action and !$action_history )
        {
            DB::rollBack();
        }else{
            DB::commit();
        }
    }
}
