<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SortSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sorteds')->insert([
            [
                "user_id" => 1,
                "category_id" => 1,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 2,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 3,
                "sorted" => 3,
            ],
            [
                "user_id" => 1,
                "category_id" => 4,
                "sorted" => 4,
            ],
            [
                "user_id" => 1,
                "category_id" => 5,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 6,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 7,
                "sorted" => 3,
            ],
            [
                "user_id" => 1,
                "category_id" => 8,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 9,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 10,
                "sorted" => 3,
            ],
            [
                "user_id" => 1,
                "category_id" => 11,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 12,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 13,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 14,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 15,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 16,
                "sorted" => 3,
            ],
            [
                "user_id" => 1,
                "category_id" => 17,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 18,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 19,
                "sorted" => 2,
            ],
            [
                "user_id" => 1,
                "category_id" => 20,
                "sorted" => 3,
            ],
            [
                "user_id" => 1,
                "category_id" => 21,
                "sorted" => 1,
            ],
            [
                "user_id" => 1,
                "category_id" => 22,
                "sorted" => 2,
            ],
        ]);
    }
}
