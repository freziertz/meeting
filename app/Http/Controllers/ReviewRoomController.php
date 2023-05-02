<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ReviewRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review_rooms = ReviewRoom::all();
        return Inertia::render('ReviwRooms/Index',compact('review_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ReviewRooms/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        ReviewRoom::create($request->all());

        return redirect()->route('review_rooms.index')
                        ->with('success','Review Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review_room = ReviewRoom::findOrFail($id);
        return Inertia::render('ReviewRooms/Show',compact('review_room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review_room = ReviewRoom::findOrFail($id);
        return Inertia::render('ReviewRooms/Show',compact('review_room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReviewRoom $reviewRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("review_rooms")->where('id', $id)->delete();

        return redirect()->route('review_rooms.index')
                        ->with('success','Review Room deleted successfully');
    }
}
