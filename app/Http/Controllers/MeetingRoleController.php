<?php

namespace App\Http\Controllers;

use App\Models\MeetingRole;
use Illuminate\Http\Request;

class MeetingRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting_roles = MeetingRole::all(); 
        return Inertia::render('MeetingRole/Index',compact('meeting_roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('MeetingRole/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MeetingType::create($request->all());

        return redirect()->route('meeting_roles.index')
                        ->with('success','Meeting role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingRole $meetingRole)
    {
        $meeting_role = MeetingType::findOrFail($id);
        return Inertia::render('MeetingRole/Show',compact('meeting_role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingRole $meetingRole)
    {
       $meeting_role = MeetingType::findOrFail($id);
       return Inertia::render('MeetingRole/Edit',compact('meeting_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingRole $meetingRole)
    {
        $meeting_role = MeetingType::find($id);

        $meeting_role->name = $request->input('name');
        $meeting_role->description = $request->input('description');

        $meeting_role->save();        

        return redirect()->route('meeting_roles.index')
                        ->with('success','MeetingType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingRole $meetingRole)
    {
        DB::table("meeting_roles")->where('id', $id)->delete();
        return redirect()->route('meeting_roles.index')
                        ->with('success','MeetingType deleted successfully');
    }
}
