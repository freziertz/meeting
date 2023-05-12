<?php

namespace App\Http\Controllers;

use App\Models\ActionStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActionStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $action_statuses = ActionStatus::all();
        return Inertia::render('ActionStatuses/Index',compact('action_statuses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ActionStatuses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        ActionStatus::create($request->all());

        return redirect()->route('action-statuses.index')
                        ->with('success','ActionStatus created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actionstatus = ActionStatus::findOrFail($id);
        return Inertia::render('ActionStatuses/Show',compact('actionstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $action_status = ActionStatus::findOrFail($id);
       return Inertia::render('ActionStatuses/Edit',compact('action_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $actionstatus = ActionStatus::find($id);

        $actionstatus->name = $request->input('name');
        $actionstatus->description = $request->input('description');


        $actionstatus->save();

        return redirect()->route('action-statuses.index')
                        ->with('success','ActionStatus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ActionStatus::where('id', $id)->delete();
        return redirect()->route('action-statuses.index')
                        ->with('success','ActionStatus deleted successfully');
    }
}
