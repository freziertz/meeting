<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Organizer;
use App\Models\Resolution;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreParticipantRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\InteractsWithBanner;

class ParticipantController extends Controller
{

    use InteractsWithBanner;
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

        $user = User::find( $request->input('participant_id'));



        if ($request['participantable_type'] == 'Meeting'){

        $meeting = Meeting::find($request->input('meeting_id'));







        $participant_exist = Participant::where('participantable_id', $request->input('meeting_id'))
                               ->where('participant_id', $request->input('participant_id'))
                               ->where('participantable_type', 'App\Models\Meeting')
                            ->first();

        // Check if Secretary exist

        $secretary_exist = Participant::where('participantable_id', $request->input('meeting_id'))

        ->where('participantable_type', 'App\Models\Meeting')
        ->where('meeting_role_id', 2)
         ->first();

        //  dd($secretary_exist);

        // Check if Chairman exist

        $chairman_exist = Participant::where('participantable_id', $request->input('meeting_id'))

        ->where('participantable_type', 'App\Models\Meeting')
        ->where('meeting_role_id', 1)
         ->first();

         if (!is_null($secretary_exist)) {

                if ($secretary_exist->meeting_role_id === $request->input('meeting_role_id') ){

                    $this->banner('Secretary already exist!','danger');

                    return redirect()->back();
                }
            }

        if (!is_null($chairman_exist)) {

            if ($chairman_exist->meeting_role_id === $request->input('meeting_role_id') ){

                $this->banner('Chairman already exist!','danger');
                return redirect()->back();
            }
        }

        if (is_null($participant_exist)) {

                 $participant = new Participant;

                 $participant->participant_id = $request->input('participant_id');
                 $participant->created_by = $created_by;
                 $participant->account_id = $account->id;
                 $participant->title = $request->input('title');
                 $participant->meeting_role_id = $request->input('meeting_role_id') ? $request->input('meeting_role_id'):1;
                 $participant->group_id = $request->input('group_id')?$request->input('group_id'): 1;


                 $meeting->participants()->save($participant);

                 if($request->input('meeting_role_id') === 1){
                    $user->assignRole('Chairperson', );
                 }elseif($request->input('meeting_role_id') === 2){
                    $user->assignRole('Secretary');
                 }elseif($request->input('meeting_role_id') === 3){
                    $user->assignRole('Participants');
                 }elseif($request->input('meeting_role_id') === 4){
                    $user->assignRole('Guest');
                 }

                 // Add as organizer if participant is Chairman or Selecretary

                 if ( ($request->input('meeting_role_id') === 1) || ($request->input('meeting_role_id') === 2) ){

                    $organizer_exist = Organizer::where('organizable_id', $request->input('meeting_id'))
                    ->where('organizer_id', $request->input('participant_id'))
                    ->where('organizable_type', 'App\Models\Meeting')
                    ->first();

                    if (is_null($organizer_exist)) {

                            $organizer = new Organizer;

                            $organizer->organizer_id = $request->input('participant_id');
                            $organizer->created_by = $created_by;
                            $organizer->account_id = $account->id;
                            $organizer->title = $request->input('title');
                            $organizer->primary = false;
                            $organizer->visible = false;


                            $meeting->organizers()->save($organizer);


                    }

                 }
         }else{
            $this->banner('Participant already exist!','danger');
            return redirect()->back();
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
    public function destroy($id, Request $request)
    {

        $participant = Participant::where('id', $id)
        ->where('participantable_type',  'App\\Models\\'. $request->input('participantable_type'))->first();
        $participant->delete();

        if ( ( $participant->meeting_role_id === 1) || ( $participant->meeting_role_id === 2) ){

        Organizer::where('organizer_id', $participant->participant_id)
            ->where('organizable_type', 'App\\Models\\' . $request->input('participantable_type'))
            ->delete();
        }
    }
}
