<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return Inertia::render('Accounts/Index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Accounts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $created_by =  Auth::user()->id;
        $request['uuid'] = (string) Str::uuid();

        $account = Account::create([
            'name' => $request->input('name'),
            'descrtiption' => $request->input('descrtiption'),
            'uuid' => $request->input('uuid'),
            'created_by' => $created_by,
            'short_name' => $request->input('short_name'),
            'pobox' => $request->input('pobox'),
            'location' => $request->input('location'),
            'ward' => $request->input('ward'),
            'district' => $request->input('district'),
            'region' => $request->input('region'),
            'country' => $request->input('country'),
            // 'street' => $request->input('street'),
            'house_no' => $request->input('house_no'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $request->input('logo'),
            'base_color' => $request->input('base_color'),
            'secondary_color' => $request->input('secondary_color'),
            'third_color' => $request->input('third_color'),
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = Account::find($id);
        return Inertia::render('Accounts/Show',compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $account = Account::find($id);
         return Inertia::render('Accounts/Edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::find($id);
        $account->name = $request->input('name');
        $account->description = $request->input('descrtiption');
        $account->short_name = $request->input('short_name');
        $account->pobox = $request->input('pobox');
        $account->location = $request->input('location');
        $account->ward = $request->input('ward');
        $account->district = $request->input('district');
        $account->region = $request->input('region');
        $account->country = $request->input('country');
        //$account-> $request->input('street');
        $account->house_no = $request->input('house_no');
        $account->telephone = $request->input('telephone');
        $account->email = $request->input('email');
        $account->website = $request->input('website');
        $account->logo = $request->input('logo');
        $account->base_color = $request->input('base_color');
        $account->secondary_color = $request->input('secondary_color');
        $account->third_color = $request->input('third_color');

        $account->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Account::where('id', $id)->delete();

        return redirect()->route('accounts.index')
                        ->with('success','Account deleted successfully');
    }
}
