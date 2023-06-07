<?php

namespace App\Http\Controllers;

use App\Models\Presenter;
use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Resolution;

use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContributorRequest;
use App\Jobs\NotifyContributorsJob;
use Illuminate\Support\Facades\Auth;

class PresenterController extends Controller
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
    public function store(Request $request, String $agenda_id)
    {
        // $created_by =  Auth::user()->id;

        // $account = User::find($created_by)->account;


        //    $meeting = Meeting::find($request->input('meeting_id'));

        //    $presenter_exist = Presenter::where('meeting_id', $request->input('meeting_id'))
        //                        ->where('agenda_id', $request->input('agenda_id'))
        //                        ->first();

        //    if (is_null($presenter_exist)) {

        //            $presenter = new Presenter;

        //            $presenter->presenter_id = $request->input('presenter_id');
        //            $presenter->created_by = $created_by;
        //            $presenter->account_id = $account->id;
        //            $presenter->agender_id = $agenda_id;

        //            $presenter->save();


        //    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Presenter $presenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presenter $presenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presenter $presenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presenter $presenter)
    {
        //
    }
}
