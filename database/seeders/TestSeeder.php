<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(20)->create();
    }

    // sail artisan migrate:refresh --seed && sail artisan db:seed --class=TestSeeder 
}
