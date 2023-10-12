<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'name'=>fake()->name(),
            'image'=>fake()->imageUrl() ,
            'image' => 'category_img/' . $this->faker->image(public_path('category_img'), 400, 300, null, false),

            ];
    }
    }