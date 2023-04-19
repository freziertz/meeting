<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meeting_types')->insert([
            'name' => 'Board',
            'description' =>'Board Meeting',           
        ]);


        DB::table('meeting_types')->insert([
            'name' => 'Management',
            'description' =>'Management Meeting',           
        ]);
    }
}
