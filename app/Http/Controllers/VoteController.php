<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVoteRequest;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $votes = Vote::all();
        return Inertia::render('Votes/Index',compact('votes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Votes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        // dd($request);
        Vote::create($request->all());

        return redirect()->route('votes.index')
                        ->with('success','Votes created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vote = Vote::findOrFail($id);
        return Inertia::render('Votes/Show',compact('vote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $vote = Vote::findOrFail($id);
       return Inertia::render('Votes/Edit',compact('vote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vote = Vote::find($id);

        $vote->title = $request->input('title');
        $vote->vote_type_id = $request->input('vote_type_id');
        $vote->venue = $request->input('venue');
        $vote->google_map_url = $request->input('google_map_url');
        $vote->timezone_id = $request->input('timezone_id');
        $vote->description = $request->input('description');
        $vote->participants_notes = $request->input('participants_notes');
        $vote->organizer_notes = $request->input('organizer_notes');
        $vote->status = $request->input('status');

        $vote->save();

        return redirect()->route('votes.index')
                        ->with('success','Vote updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vote::where('id', $id)->delete();
        return redirect()->route('votes.index')
                        ->with('success','Vote deleted successfully');
    }
}
