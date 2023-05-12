<?php

namespace App\Http\Controllers;

use App\Models\ActionHistory;
use Illuminate\Http\Request;

use App\Models\User;
;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ActionHistoryController extends Controller
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
    public function store(Request $request)
    {


        // $created_by =  Auth::user()->id;

        // $account = User::find($request['created_by'])->account;

        // $request['account_id'] = $account->id;



        //     $action_history = new ActionHistory();

        //     $action_history->action_id = $request->input('action_id');
        //     $action_history->status_id = $request->input('status_id') ? $request->input('status_id') : 999;
        //     $action_history->notes = $request->input('notes') ? $request->input('notes') : 'New';
        //     $action_history->as_of_date = $request->input('as_of_date') ? $request->input('as_of_date') : Carbon::now()->format('Y-m-d');

        //     $action_history->created_by = $created_by;
        //     $action_history->account_id = $account->id;


        //     $action_history->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(ActionHistory $actionHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActionHistory $actionHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActionHistory $actionHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActionHistory $actionHistory)
    {
        //
    }
}
