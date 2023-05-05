<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuid = (string) Str::uuid();

        DB::table('accounts')->insert([
            'name' => 'Datahouse Tanzania Limited',
            'uuid' => $uuid,
            'created_by'  => 1,
        ]);

    }
}
