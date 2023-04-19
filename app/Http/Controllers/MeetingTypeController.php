<?php

namespace App\Http\Controllers;

use App\Models\MeetingTypeType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMeetingTypeRequest;

class MeetingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting_type_types = MeetingTypeType::all(); 
        return Inertia::render('MeetingTypes/Index',compact('meeting_type_types'));
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
    public function store(StoreMeetingTypeRequest $request)
    {
        MeetingType::create($request->all());

        return redirect()->route('meeting_type-types.index')
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
    public function update(StoreMeetingTypeRequest $request, string $id)
    {
        $meeting_type = MeetingType::find($id);

        $meeting_type->name = $request->input('name');
        $meeting_type->description = $request->input('description');

        $meeting_type->save();        

        return redirect()->route('meeting_types.index')
                        ->with('success','MeetingType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("meeting_types")->where('id', $id)->delete();
        return redirect()->route('meeting_types.index')
                        ->with('success','MeetingType deleted successfully');
    }
}
