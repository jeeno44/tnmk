<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserCreateSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProdTableSeeder::class);
        $this->call(SortSeeder::class);
    }
}
