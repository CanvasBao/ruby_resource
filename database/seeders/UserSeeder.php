<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasAdmin = DB::table('users')->where('role', 9)->exists();
        if (!$hasAdmin) {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@rubylabel.test',
                'password' => Hash::make('baoit13'),
                'role' => 9,
            ]);
        }
    }
}
