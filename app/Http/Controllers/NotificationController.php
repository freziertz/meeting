<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreNotificationRequest;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return Inertia::render('Notification/Index',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Notifications/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Notification::create($request->all());

        return redirect()->route('notifications.index')
                        ->with('success','Notification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notification::findOrFail($id);
        return Inertia::render('Notifications/Show',compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $notification = Notification::findOrFail($id);
       return Inertia::render('Notifications/Edit',compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notification = Notification::find($id);

        $notification->title = $request->input('title');
        $notification->notification_type_id = $request->input('notification_type_id');
        $notification->venue = $request->input('venue');
        $notification->google_map_url = $request->input('google_map_url');
        $notification->timezone_id = $request->input('timezone_id');
        $notification->description = $request->input('description');
        $notification->participants_notes = $request->input('participants_notes');
        $notification->organizer_notes = $request->input('organizer_notes');
        $notification->status = $request->input('status');

        $notification->save();

        return redirect()->route('notifications.index')
                        ->with('success','Notification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("notifications")->where('id', $id)->delete();
        return redirect()->route('notifications.index')
                        ->with('success','Notification deleted successfully');
    }
}
