<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $account = Account::create(['name' => 'Acme Corporation']);

        $user = User::create([
            'name' => 'Frezier',
            'title' => 'Mr',
            'first_name' => 'Yahaya',
            'owner' => true,
            'middle_name' => '',
            'last_name' => 'Frezier',
            'initials' => 'YAF',
            'email' => 'yahaya.frezier@datahousetza.com',
            'designation' => 'Business Development Manager',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);

        // $role = Role::create(['name' => 'Admin']);

        $role = Role::create(['guard_name' => 'sanctum','name' => 'Admin']);

        $permissions = Permission::where('guard_name','sanctum')->pluck('id','id')->all();



        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        // $role = Role::create(['name' => 'Admin']);


        // $permissions = Permission::where('guard_name','web')->pluck('id','id')->all();



        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
