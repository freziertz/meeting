<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
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

        DB::table('users')->insert([
            'name' => 'Woiso',
            'title' => 'Mr',
            'first_name' => 'Godfrey',
            'owner' => false,
            'middle_name' => '',
            'last_name' => 'Woiso',
            'initials' => 'GRW',
            'email' => 'godfrey.woiso@datahousetza.com',
            'designation' => 'Managing Director',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Makolo',
            'title' => 'Mr',
            'first_name' => 'Alex',
            'owner' => false,
            'middle_name' => '',
            'last_name' => 'Makolo',
            'initials' => 'AM',
            'email' => 'alex.makolo@datahousetza.com',
            'designation' => 'Accountant',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Kessy',
            'title' => 'Mr',
            'first_name' => 'Bryton',
            'owner' => false,
            'middle_name' => '',
            'last_name' => 'Kessy',
            'initials' => 'BK',
            'email' => 'bryton.kessy@datahousetza.com',
            'designation' => 'Software Engineer',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Mhagama',
            'title' => 'Mr',
            'first_name' => 'Franco',
            'owner' => false,
            'middle_name' => '',
            'last_name' => 'Mhagama',
            'initials' => 'FM',
            'email' => 'franco.mhagama@datahousetza.com',
            'designation' => 'Software Engineer',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'James',
            'title' => 'Mr',
            'first_name' => 'Aron',
            'owner' => false,
            'middle_name' => '',
            'last_name' => 'James',
            'initials' => 'AJ',
            'email' => 'aron.james@datahousetza.com',
            'designation' => 'Electronic Engineer',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Machangu',
            'title' => 'Mr',
            'first_name' => 'Silvano',
            'owner' => false,
            'middle_name' => '',
            'last_name' => 'Machangu',
            'initials' => 'SM',
            'email' => 'silvano.machangu@datahousetza.com',
            'designation' => 'Logistic Officer',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);


        DB::table('users')->insert([
            'name' => 'Msanya',
            'title' => 'Miss',
            'first_name' => 'Zera',
            'owner' => false,
            'middle_name' => 'Ayubu',
            'last_name' => 'Msanya',
            'initials' => 'ZAM',
            'email' => 'zera.msanya@datahousetza.com',
            'designation' => 'Office Administrator',
            'organization_id' => 1,
            'storage_limit' => '200',
            'pa_email' => 'zera.msanya@datahousetza.com', // person assistance email
            'send_welcome_email' => 0,
            'send_start_guide' => 0,
            'password' => Hash::make('12345678'), // should be generated automatically then the user should change at first login
            'created_by' => 1,
            'account_id' => 1,
        ]);



    }
}
