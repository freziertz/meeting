<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('action_statuses')->insert([
            'name' => 'Completed',
            'description' =>'Completed 100%',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('action_statuses')->insert([
            'name' => 'In Progress',
            'description' =>'Progress in percentage',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);

        DB::table('action_statuses')->insert([
            'name' => 'Outstanding',
            'description' =>'Outstanding',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);



    }
}
