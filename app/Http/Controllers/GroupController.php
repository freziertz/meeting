<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return Inertia::render('Groups/Index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Groups/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Group::create($request->all());

        return redirect()->route('groups.index')
                        ->with('success','Meeting role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);
        return Inertia::render('Groups/Show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $group = Group::findOrFail($id);
       return Inertia::render('Groups/Edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        Group::where('id', $id)->delete();
        return redirect()->route('groups.index')
                        ->with('success','Group deleted successfully');
    }
}
