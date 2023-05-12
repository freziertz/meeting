<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreScheduleRequest;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return Inertia::render('Schedules/Index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Schedules/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Schedule::create($request->all());

        return redirect()->route('schedules.index')
                        ->with('success','Schedules created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = Schedule::findOrFail($id);
        return Inertia::render('Schedules/Show',compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $schedule = Schedule::findOrFail($id);
       return Inertia::render('Schedules/Edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schedule::find($id);

        $schedule->meeting_id = $request->input('meeting_id');
        $schedule->meeting_start_date = $request->input('meeting_start_date');
        $schedule->meeting_end_date = $request->input('meeting_end_date');
        $schedule->meeting_start_time = $request->input('meeting_start_time');
        $schedule->meeting_end_time = $request->input('meeting_end_time');


        $schedule->save();


        return redirect()->route('schedules.index')
                        ->with('success','Schedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Schedule::where('id', $id)->delete();
        return redirect()->route('schedules.index')
                        ->with('success','Schedule deleted successfully');
    }
}
