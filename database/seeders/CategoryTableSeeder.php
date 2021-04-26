<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    static $category = [
        0 => [
            'id' => 1,
            'user_id' => 1,
            'parent_id' => NULL,
            'title' => 'Цветной металлопрокат',
            'level' => 1,
            'queue' => 1,
        ],
        1 => [
            'id' => 2,
            'user_id' => 1,
            'parent_id' => NULL,
            'title' => 'Нержавеющий металлопрокат',
            'level' => 1,
            'queue' => 2,

        ],
        2 => [
            'id' => 3,
            'user_id' => 1,
            'parent_id' => NULL,
            'title' => 'Черный металлопрокат',
            'level' => 1,
            'queue' => 3,
        ],
        3 => [
            'id' => 4,
            'user_id' => 1,
            'parent_id' => NULL,
            'title' => 'Цветной металлопрокат',
            'level' => 1,
            'queue' => 4,
        ],
        4 => [
            'id' => 5,
            'user_id' => 1,
            'parent_id' => 1,
            'title' => 'Анод',
            'level' => 2,
            'queue' => 1,
        ],
        5 => [
            'id' => 6,
            'user_id' => 1,
            'parent_id' => 1,
            'title' => 'Балка',
            'level' => 2,
            'queue' => 2,
        ],
        6 => [
            'id' => 7,
            'user_id' => 1,
            'parent_id' => 1,
            'title' => 'Брусок',
            'level' => 2,
            'queue' => 3,
        ],
        7 => [
            'id' => 8,
            'user_id' => 1,
            'parent_id' => 5,
            'title' => 'Анод кадмий',
            'level' => 3,
            'queue' => 1,
        ],
        8 => [
            'id' => 9,
            'user_id' => 1,
            'parent_id' => 5,
            'title' => 'Анод медный',
            'level' => 3,
            'queue' => 2,
        ],
        9 => [
            'id' => 10,
            'user_id' => 1,
            'parent_id' => 5,
            'title' => 'Анод никелевый',
            'level' => 3,
            'queue' => 3,
        ],
        10 => [
            'id' => 11,
            'user_id' => 1,
            'parent_id' => 6,
            'title' => 'Балка Алюминиевая',
            'level' => 3,
            'queue' => 1,
        ],
        11 => [
            'id' => 12,
            'user_id' => 1,
            'parent_id' => 6,
            'title' => 'Балка магниевая',
            'level' => 3,
            'queue' => 2,
        ],
        12 => [
            'id' => 13,
            'user_id' => 1,
            'parent_id' => 7,
            'title' => 'Брусок Молибденовый',
            'level' => 3,
            'queue' => 1,
        ],
        13 => [
            'id' => 14,
            'user_id' => 1,
            'parent_id' => 7,
            'title' => 'Брусок олово',
            'level' => 3,
            'queue' => 2,
        ],
        14 => [
            'id' => 15,
            'user_id' => 1,
            'parent_id' => 2,
            'title' => 'Балка',
            'level' => 2,
            'queue' => 1,
        ],
        15 => [
            'id' => 16,
            'user_id' => 1,
            'parent_id' => 2,
            'title' => 'Втулка',
            'level' => 2,
            'queue' => 2,
        ],
        16 => [
            'id' => 17,
            'user_id' => 1,
            'parent_id' => 2,
            'title' => 'Дробь',
            'level' => 2,
            'queue' => 3,
        ],
        17 => [
            'id' => 18,
            'user_id' => 1,
            'parent_id' => 3,
            'title' => 'Арматура',
            'level' => 2,
            'queue' => 1,
        ],
        18 => [
            'id' => 19,
            'user_id' => 1,
            'parent_id' => 3,
            'title' => 'Балка',
            'level' => 2,
            'queue' => 2,
        ],
        19 => [
            'id' => 20,
            'user_id' => 1,
            'parent_id' => 3,
            'title' => 'Баллон',
            'level' => 2,
            'queue' => 3,
        ],
        20 => [
            'id' => 21,
            'user_id' => 1,
            'parent_id' => 9,
            'title' => 'Придаток',
            'level' => 4,
            'queue' => 1,
        ],
        21 => [
            'id' => 22,
            'user_id' => 1,
            'parent_id' => 9,
            'title' => 'Задаток',
            'level' => 4,
            'queue' => 2,
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach (self::$category as $cat) {
            Category::create($cat);
        }
    }
}
