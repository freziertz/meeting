<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Organization;
use App\Models\Account;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
// use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Request as Req;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Users/Index',  [
            'filters' => Req::all('search', 'role', 'trashed'),

            'users' => Auth::user()->account->users()
                ->orderByName()
                ->filter(Req::only('search', 'role', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'owner' => $user->owner,
                    'photo' => $user->profile_photo_path ? URL::route('image', ['path' => $user->profile_photo_path, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
                    'deleted_at' => $user->deleted_at,
                ]),


        ]);

        // dd($users);


    }

    // public function indexw()
    // {
    //     return Inertia::render('Users/Index', [
    //         'filters' => Request::all('search', 'role', 'trashed'),
    //         'users' => Auth::user()->account->users()
    //             ->orderByName()
    //             ->filter(Request::only('search', 'role', 'trashed'))
    //             ->get()
    //             ->transform(fn ($user) => [
    //                 'id' => $user->id,
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'owner' => $user->owner,
    //                 'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
    //                 'deleted_at' => $user->deleted_at,
    //             ]),
    //     ]);

    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::get();
        $accounts = Account::get();
        // $organizations = Organization::get();
        return Inertia::render('Users/Create',compact('roles','accounts'));
        // return Inertia::render('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['created_by'] =  Auth::user()->id;

        $account = User::find($request['created_by'])->account;

        $request['account_id'] = $account->id;

        $request['owner'] = false;

        $request['password'] = Hash::make($request['password']);

        DB::beginTransaction();

        $user = User::create($request->all());

        $roles = Role::get();

        // dd($request->input('roleIds'));

        $roles = $user->syncRoles($request['roleIds']);

        // $roles = $user->syncRoles(['Admin','Users']);

        if (!$user and !$roles)
            {
                DB::rollBack();
            }else{
                DB::commit();

             return redirect()->route('users.index')
                        ->with('success','User created successfully.');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $roles = Role::get();
        $accounts = Account::get();
        // $organizations = Organization::get();
        $userRoles = $user->roles->pluck('id','id')->all();

        return Inertia::render('Users/Edit',compact('user', 'accounts', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $this->validate($request, [

             'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$id,
            // 'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            // 'roles' => 'required'
        ]);





        if (isset($request['photo'])) {
            $user = User::find($id);
            $user->updateProfilePhoto($request['photo']);
        }

         $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }


        DB::beginTransaction();
        $user = User::find($id);
        $user_updated = $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();



        $roles_updated = $user->assignRole($request->input('roleIds'));

        // $roles = $user->syncRoles($request['roleIds']);

        if (!$user_updated and !$roles_updated)
        {
            DB::rollBack();
        }else{
            DB::commit();

         return redirect()->route('users.index')
                    ->with('success','User updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::table("users")->where('id', $id)->delete();

        // return redirect()->route('users.index')
        //                 ->with('success','User deleted successfully');
    }
}
