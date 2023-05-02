<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePurposeRequest;
use Illuminate\Support\Facades\Auth;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purposes = Purpose::all();
        return Inertia::render('Purposes/Index',compact('purposes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Purposes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Purpose::create($request->all());

        return redirect()->route('purposes.index')
                        ->with('success','Purpose created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purpose = Purpose::findOrFail($id);
        return Inertia::render('Purposes/Show',compact('purpose'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $purpose = Purpose::findOrFail($id);
       return Inertia::render('Purposes/Edit',compact('purpose'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purpose = Purpose::find($id);

        $purpose->name = $request->input('name');
        $purpose->description = $request->input('description');


        $purpose->save();

        return redirect()->route('purposes.index')
                        ->with('success','Purpose updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("purposes")->where('id', $id)->delete();
        return redirect()->route('purposes.index')
                        ->with('success','Purpose deleted successfully');
    }
}
