<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            'name' => 'Board',
            'description' =>'Board Members',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('groups')->insert([
            'name' => 'Management',
            'description' =>'Management Team',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('groups')->insert([
            'name' => 'Tender Board',
            'description' =>'Tender Board Team',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);

        DB::table('groups')->insert([
            'name' => 'Marketing',
            'description' =>'Marketing Team',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);

        DB::table('groups')->insert([
            'name' => 'Technical',
            'description' =>'Technical Team',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);
    }
}
