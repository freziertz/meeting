<?php

namespace App\Http\Controllers;

use App\Models\MeetingType;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMeetingTypeRequest;
use Illuminate\Support\Facades\Auth;

class MeetingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting_types = MeetingType::all();
        return Inertia::render('MeetingTypes/Index',compact('meeting_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('MeetingTypes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        MeetingType::create($request->all());

        return redirect()->route('meeting-types.index')
                        ->with('success','MeetingType type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $meeting_type = MeetingType::findOrFail($id);
        return Inertia::render('MeetingTypes/Show',compact('meeting_type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $meeting_type = MeetingType::findOrFail($id);
       return Inertia::render('MeetingTypes/Edit',compact('meeting_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meeting_type = MeetingType::find($id);

        $meeting_type->name = $request->input('name');
        $meeting_type->description = $request->input('description');

        $meeting_type->save();

        return redirect()->route('meeting-types.index')
                        ->with('success','MeetingType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MeetingType::where('id', $id)->delete();
        return redirect()->route('meeting-types.index')
                        ->with('success','MeetingType deleted successfully');
    }
}
