<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreActionRequest;
use Inertia\Inertia;
Use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{

    public $meeting;


    function __constructor($meeting)
    {
        $this->meeting = $meeting;
    }
    /**
     * Display a listing of the resource.
     */
    // private function company()
    // {
    //   $user = User::find(auth()->user()->id);

    //   return Company::find($user->company_id);
    // }

    public function index($meeting)
    {
        // $actions = Action::all();
        $actions = Meeting::find($meeting->id)->actions;
        return Inertia::render('Actions/Index',compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Actions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Action::create($request->all());

        return redirect()->route('actions.index')
                        ->with('success','Action created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $action = Action::findOrFail($id);
        return Inertia::render('Actions/Show',compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $action = Action::findOrFail($id);
       return Inertia::render('Actions/Edit',compact('action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreActionRequest $request, string $id)
    {

        $created_by =  Auth::user()->id;
        $account = User::find($created_by)->account;

        $action = Action::find($id);



        $action->agender_id = $request->input('agender_id');
        $action->name = $request->input('name');
        $action->actioner_id = $request->input('actioner_id');
        $action->due_date = $request->input('due_date');
        $action->days = $request->input('days');
        $action->status = $request->input('status');
        $action->as_off = $request->input('as_off');
        // $action->created_by = $created_by;
        // $action->account_id = $account->id;

        $action->save();

        return redirect()->route('actions.index')
                        ->with('success','Action updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("actions")->where('id', $id)->delete();

        return redirect()->route('actions.index')
                        ->with('success','Action deleted successfully');
    }
}
