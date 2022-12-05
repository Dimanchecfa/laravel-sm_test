<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition()
    {
         $sentence = $this->faker->randomElement(generateProductDescriptions());
         $title = $this->faker->randomElement(generateProductNames());
            $price = $this->faker->randomElement(generateProductPrices());
        return [
            'nom' => $title,
            'description' => $sentence,
            'prix' => $price,
            'image' => $this->faker->imageUrl(200, 200 , 'food'),
            'category_id' => Category::all()->unique()->random()->id,
        ];
    }
}
