<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOrganizerRequest;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $organizer = Organizer::where('meeting_id', $request->input('meeting_id'))
                               ->where('user_id', $request->input('user_id'))
                            ->first();

        if (is_null($organizer)) {
                Organizer::create([
                    'meeting_id' => $request->input('meeting_id'),
                    'user_id' => $request->input('user_id'),
                    'title' => $request->input('title'),
                    'primary' => $request->input('primary'),
                 ]);
         }

        // return redirect()->route('meetings.index')
        //                 ->with('success','Organizer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrganizerRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
