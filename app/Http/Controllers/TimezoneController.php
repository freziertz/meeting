<?php

namespace App\Http\Controllers;

use App\Models\Timezone;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTimezoneRequest;
use Illuminate\Support\Facades\Auth;

class TimezoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timezones = Timezone::all();
        return Inertia::render('Timezones/Index',compact('timezones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Timezones/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Timezone::create($request->all());

        return redirect()->route('timezones.index')
                        ->with('success','Timezone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timezone = Timezone::findOrFail($id);
        return Inertia::render('Timezones/Show',compact('timezone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $timezone = Timezone::findOrFail($id);
       return Inertia::render('Timezones/Edit',compact('timezone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $timezone = Timezone::find($id);

        $timezone->title = $request->input('title');
        $timezone->timezone_type_id = $request->input('timezone_type_id');
        $timezone->venue = $request->input('venue');
        $timezone->google_map_url = $request->input('google_map_url');
        $timezone->timezone_id = $request->input('timezone_id');
        $timezone->description = $request->input('description');
        $timezone->participants_notes = $request->input('participants_notes');
        $timezone->organizer_notes = $request->input('organizer_notes');
        $timezone->status = $request->input('status');

        $timezone->save();

        return redirect()->route('timezones.index')
                        ->with('success','Timezone updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Timezone::where('id', $id)->delete();
        return redirect()->route('timezones.index')
                        ->with('success','Timezone deleted successfully');
    }
}
