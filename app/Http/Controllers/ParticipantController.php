<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Resolution;
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

        if ($request['participantable_type'] == 'Meeting'){

        $meeting = Meeting::find($request->input('meeting_id'));





        $participant_exist = Participant::where('participantable_id', $request->input('meeting_id'))
                               ->where('participant_id', $request->input('participant_id'))
                               ->where('participantable_type', 'App\Models\Meeting')
                            ->first();

        if (is_null($participant_exist)) {

                 $participant = new Participant;

                 $participant->participant_id = $request->input('participant_id');
                 $participant->created_by = $created_by;
                 $participant->account_id = $account->id;
                 $participant->title = $request->input('title');
                 $participant->meeting_role_id = $request->input('meeting_role_id')?$request->input('meeting_role_id'):1;
                 $participant->group_id = $request->input('group_id')?$request->input('group_id'): 1;


                 $meeting->participants()->save($participant);
         }
        }

        if ($request['participantable_type'] == 'Resolution'){

            $resolution = Resolution::find($request->input('resolution_id'));



            $participant_exist = Participant::where('participantable_id', $request->input('resolution_id'))
                                   ->where('participant_id', $request->input('voter_id'))
                                   ->where('participantable_type', 'App\Models\Resolution')
                                ->first();

            if (is_null($participant_exist)) {

                     $participant = new Participant;

                     $participant->participant_id = $request->input('voter_id');
                     $participant->created_by = $created_by;
                     $participant->account_id = $account->id;
                     $participant->title = $request->input('title');
                    //  $participant->resolution_role_id = $request->input('resolution_role_id');
                     $participant->group_id = $request->input('group_id');


                     $resolution->participants()->save($participant);
             }
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

        Participant::where('id', $id)->delete();
    }
}
