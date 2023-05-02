<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOrganizerRequest;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // protected $meeting;
    // protected $created_by;
    // protected $account;


    function __constructor()
    {
        // $this->meeting = $meeting;

    }


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
        $created_by =  Auth::user()->id;
        $account = User::find($created_by)->account;



        $organizer = Organizer::where('meeting_id', $request->input('meeting_id'))
                               ->where('organizer_id', $request->input('organizer_id'))
                            ->first();

        if (is_null($organizer)) {
                Organizer::create([
                    'meeting_id' => $request->input('meeting_id'),
                    'organizer_id' => $request->input('organizer_id'),
                    'title' => $request->input('title'),
                    'primary' => $request->input('primary'),
                    'created_by' => $created_by,
                    'account_id' => $account->id

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        DB::table("organizers")->where('id', $id)->delete();
    }
}
