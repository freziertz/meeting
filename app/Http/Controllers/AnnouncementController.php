<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return Inertia::render('Announcements/Index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Announcements/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Announcement::create($request->all());

        return redirect()->route('announcements.index')
                        ->with('success','Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return Inertia::render('Votes/Show',compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return Inertia::render('Announcements/Edit',compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $announcement = Announcement::findOrFail($announcement->id);

        // if ($request->user()->cannot('update', $announcement)) {
        //     abort(403);
        // }

        $announcement->title = $request->input('title');
        $announcement->content = $request->input('content');
        $announcement->start_date = $request->input('start_date');
        $announcement->end_date = $request->input('end_date');
        $announcement->start_time = $request->input('start_time');
        $announcement->end_time = $request->input('end_time');


        $announcement->save();

        return redirect()->route('announcements.index')
                        ->with('success','Announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Announcement::where('id', $id)->delete();

        return redirect()->route('announcements.index')
                        ->with('success','Announcement deleted successfully');
    }
}
