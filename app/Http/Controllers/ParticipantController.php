<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreParticipantRequest;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {

        $created_by=  Auth::user()->id;

        $account = User::find($created_by)->account;



        $participant = Participant::where(
                              'meeting_id', $request->input('meeting_id'))
                               ->where('participant_id', $request->input('participant_id'))
                            ->first();

        if (is_null($participant)) {
                Participant::create([
                    'meeting_id' => $request->input('meeting_id'),
                    'participant_id' => $request->input('participant_id'),
                    'group_id' => $request->input('group_id'),
                    'meeting_role_id' => $request->input('meeting_role_id'),
                    'title' => $request->input('title'),
                    'created_by' => $created_by,
                    'account_id' => $account->id,
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table("participants")->where('id', $id)->delete();
    }
}
