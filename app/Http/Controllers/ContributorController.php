<?php

namespace App\Http\Controllers;

use App\Models\Contributor;
use App\Models\User;
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

         $contributor = Contributor::where('meeting_id', $request->input('meeting_id'))
                               ->where('contributor_id', $request->input('contributor_id'))
                            ->first();

        if (is_null($contributor)) {
                Contributor::create([
                    'meeting_id' => $request->input('meeting_id'),
                    'contributor_id' => $request->input('contributor_id'),
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

        DB::table("contributors")->where('id', $id)->delete();

    }
}
