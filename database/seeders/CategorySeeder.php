<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $categories = array(
        [
        'type' => 'Legumes',
        'image' => 'images/legumes.jpg',
        ],
        [
        'type' => 'Fruits',
        'image' => 'images/fruits.jpg',
        ],
        [
        'type' => 'tubercules',
        'image' => 'images/tubercules.jpg',
        ]
    );
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
