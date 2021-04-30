<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Category())->insert([
            [
                'name' => 'Hodinky',
                'slug' => 'hodinky'
            ],
            [
                'name' => 'Parfémy',
                'slug' => 'parfemy'
            ],
            [
                'name' => 'Kometika',
                'slug' => 'kometika'
            ]
        ]);
    }
}
