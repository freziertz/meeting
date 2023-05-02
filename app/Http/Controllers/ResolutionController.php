<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreResolutionRequest;
use Illuminate\Support\Facades\Auth;

class ResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resolutions = Resolution::all();
        return Inertia::render('Resolution/Index',compact('resolutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Resolutions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Resolution::create($request->all());

        return redirect()->route('resolution.index')
                        ->with('success','Resolution created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resolution = Resolution::findOrFail($id);
        return Inertia::render('Resolutions/Show',compact('resolution'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resolution = Resolution::findOrFail($id);
        return Inertia::render('Resolutions/Edit',compact('resolution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resolution = Resolution::find($id);

        $resolution->title = $request->input('title');
        $resolution->resolution_type_id = $request->input('resolution_type_id');
        $resolution->venue = $request->input('venue');
        $resolution->google_map_url = $request->input('google_map_url');
        $resolution->timezone_id = $request->input('timezone_id');
        $resolution->description = $request->input('description');
        $resolution->participants_notes = $request->input('participants_notes');
        $resolution->organizer_notes = $request->input('organizer_notes');
        $resolution->status = $request->input('status');

        $resolution->save();

        return redirect()->route('resolutions.index')
                        ->with('success','Resolution updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("resolutions")->where('id', $id)->delete();
        return redirect()->route('resolutions.index')
                        ->with('success','Resolution deleted successfully');
    }
}
