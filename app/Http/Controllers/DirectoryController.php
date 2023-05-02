<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Directory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directories = Directory::all();
        return Inertia::render('Directories/Index',compact('directories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Directories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        Directory::create($request->all());

        return redirect()->route('directories.index')
                        ->with('success','Directory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $directory = Directory::findOrFail($id);
        return Inertia::render('Directories/Show',compact('directory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $directory = Directory::findOrFail($id);
        return Inertia::render('Directories/Edit',compact('directory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Directory $directory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("directories")->where('id', $id)->delete();

        return redirect()->route('directories.index')
                        ->with('success','Directory deleted successfully');
    }
}
