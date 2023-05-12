<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\MeetingRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeetingRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting_roles = MeetingRole::all();
        return Inertia::render('MeetingRoles/Index',compact('meeting_roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('MeetingRoles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        MeetingRole::create($request->all());

        return redirect()->route('meeting-roles.index')
                        ->with('success','Meeting role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $meeting_role = MeetingRole::findOrFail($id);
        return Inertia::render('MeetingRoles/Show',compact('meeting_role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $meeting_role = MeetingRole::findOrFail($id);
       return Inertia::render('MeetingRoles/Edit',compact('meeting_role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $meeting_role = MeetingRole::find($id);

        $meeting_role->name = $request->input('name');
        $meeting_role->description = $request->input('description');

        $meeting_role->save();

        return redirect()->route('meeting-roles.index')
                        ->with('success','MeetingType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MeetingRole::where('id', $id)->delete();
        return redirect()->route('meeting-roles.index')
                        ->with('success','MeetingType deleted successfully');
    }
}
