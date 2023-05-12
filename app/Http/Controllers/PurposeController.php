<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePurposeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Req;


class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $purposes = Purpose::all();
        // return Inertia::render('Purposes/Index',compact('purposes'));




        // $purposes = Purpose::query();
        // dd($purposes);



        return Inertia::render('Purposes/Index', [
            'filters' => $request->all('search', 'trashed'),
            'purposes' => Purpose::query()
                ->orderBy('name')
                ->filter($request->only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($purpose) => [
                    'id' => $purpose->id,
                    'name' => $purpose->name,
                    'description' => $purpose->description,
                    'deleted_at' => $purpose->deleted_at,
                ]),
        ]);

        //  dd($purposes);





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
        Purpose::where('id', $id)->delete();
        return redirect()->route('purposes.index')
                        ->with('success','Purpose deleted successfully');
    }
}
