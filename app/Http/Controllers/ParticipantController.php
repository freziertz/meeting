<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreParticipantRequest;

class ParticipantController extends Controller
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
    public function store(StoreParticipantRequest $request)
    {
        $participant = Participant::where(
                              'meeting_id', $request->input('meeting_id'))
                               ->where('user_id', $request->input('user_id'))
                            ->first();

        if (is_null($participant)) {
                Participant::create([
                    'meeting_id' => $request->input('meeting_id'),
                    'user_id' => $request->input('user_id'),
                    'group_id' => $request->input('group_id'),
                    'meeting_role_id' => $request->input('meeting_role_id'),
                    'title' => $request->input('title'),
                    'primary' => $request->input('primary'),
                 ]);
         }
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
    public function update(StoreParticipantRequest $request, string $id)
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
