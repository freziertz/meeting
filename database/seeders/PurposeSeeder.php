<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purposes')->insert([
            'name' => 'Voting',
            'description' =>'For Voting',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);


        DB::table('purposes')->insert([
            'name' => 'Review',
            'description' =>'For Review',
            'account_id'  => 1,
            'created_by'  => 1,
        ]);
    }
}
