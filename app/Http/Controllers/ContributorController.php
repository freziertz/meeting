<?php

namespace App\Http\Controllers;

use App\Models\Contributor;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContributorRequest;
use Illuminate\Support\Facades\Auth;

class ContributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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

         $meeting = Meeting::find($request->input('meeting_id'));

         $contributor_exist = Contributor::where('contributable_id', $request->input('meeting_id'))
                               ->where('contributor_id', $request->input('contributor_id'))
                            ->first();

        if (is_null($contributor_exist)) {

                $contributor = new Contributor;

                $contributor->contributor_id = $request->input('contributor_id');
                $contributor->created_by = $created_by;
                $contributor->account_id = $account->id;
                $contributor->title = $request->input('title');

                $meeting->contributors()->save($contributor);
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

        DB::table("contributors")->where('id', $id)->delete();

    }
}
