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
use App\Traits\InteractsWithBanner;


class PurposeController extends Controller
{

    use InteractsWithBanner;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $purposes = Purpose::query();
        // return Inertia::render('Purposes/Index',compact('purposes'));




        // $purposes = Purpose::query();
        // dd($purposes);

        $this->authorize( ability: 'viewAny' , arguments: Purpose::class);

        // if ($request->user()->cannot('viewAny', Purpose::class)) {
        //     $this->banner('Meeting created successfully!');
        //     abort(403);

        // }

        // dd($request->user()->can('create', Purpose::class));
        // $user->hasPermissionTo('create purposes');



        return Inertia::render('Purposes/Index', [

            'filters' => $request->all('search', 'trashed'),
            'purposes' =>  Purpose::query()
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
                'can' => [
                    'create' => $request->user()->can('create', Purpose::class),
                    'edit' => $request->user()->can('edit', Purpose::class),
                    'list' => $request->user()->can('list', Purpose::class),
                    // 'delete' => $request->user()->can('delete', Purpose::class),
                ],
        ]);

        //  dd($purposes);





    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Purpose::class)) {
            abort(403);
        }

        return Inertia::render('Purposes/Create');
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

        Purpose::create($request->all());

        return redirect()->route('purposes.index')
                        ->with('success','Purpose created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $purpose = Purpose::findOrFail($id);

        if ($request->user()->cannot('list', $purpose)) {
            abort(403);
        }


        return Inertia::render('Purposes/Show',compact('purpose'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $purpose = Purpose::findOrFail($id);

        if ($request->user()->cannot('update', $purpose)) {
            abort(403);
        }

        $can =[
            'create' => $request->user()->can('create', Purpose::class),
            'edit' => $request->user()->can('create', Purpose::class),
            'list' => $request->user()->can('create', Purpose::class),
            'delete' => $request->user()->can('create', Purpose::class),
        ];


        return Inertia::render('Purposes/Edit',compact('purpose', 'can'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purpose = Purpose::findOrFail($id);

        if ($request->user()->cannot('update', $purpose)) {
            abort(403);
        }

        $purpose->name = $request->input('name');
        $purpose->description = $request->input('description');


        $purpose->save();

        return redirect()->route('purposes.index')
                        ->with('success','Purpose updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $purpose = Purpose::findOrFail($id);

        $this->authorize('delete', $purpose);

        $purpose->delete();


        // if ($request->user()->cannot('delete', Purpose::class)) {
        //     abort(403);
        // }

        return redirect()->route('purposes.index')
                        ->with('success','Purpose deleted successfully');
    }
}
