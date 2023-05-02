<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetingRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meeting_types')->insert([
            'name' => 'Board',
            'description' =>'Board Meeting',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('meeting_types')->insert([
            'name' => 'Management',
            'description' =>'Management Meeting',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);
    }
}
