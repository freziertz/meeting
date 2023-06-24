<?php

namespace App\Http\Controllers;

use App\Models\Minute;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MinuteController extends Controller
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
        if ($request->user()->cannot('create', Purpose::class)) {
            abort(403);
        }

        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Minute::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Minute $minute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Minute $minute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Minute $minute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Minute $minute)
    {
        //
    }
}
