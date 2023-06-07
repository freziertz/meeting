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
        DB::table('meeting_roles')->insert([
            'name' => 'Chairperson',
            'description' =>'Meeting Chairperson',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('meeting_roles')->insert([
            'name' => 'Secretary',
            'description' =>'Meeting Secretary',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);

        DB::table('meeting_roles')->insert([
            'name' => 'Organizer',
            'description' =>'Meeting Organizer',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);

        DB::table('meeting_roles')->insert([
            'name' => 'Contributor',
            'description' =>'Agenda Contributor',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('meeting_roles')->insert([
            'name' => 'Participant',
            'description' =>'Meeting Participant',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);
    }
}
