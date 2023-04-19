<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $groups = Group::all(); 
        return Inertia::render('Group/Index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Group/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Group::create($request->all());

        return redirect()->route('groups.index')
                        ->with('success','Meeting role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $group = Group::findOrFail($id);
        return Inertia::render('Group/Show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
       $group = Group::findOrFail($id);
       return Inertia::render('Group/Edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $group = Group::find($id);

        $group->name = $request->input('name');
        $group->description = $request->input('description');

        $group->save();        

        return redirect()->route('groups.index')
                        ->with('success','Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        DB::table("groups")->where('id', $id)->delete();
        return redirect()->route('groups.index')
                        ->with('success','Group deleted successfully');
    }
}
