<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'date_to_publish' => $this->faker->dateTimeBetween('now','+1 years'),
            'status' => $this->faker->randomElement(['publish','unpublish']),
            'image'=> 'https://picsum.photos/300/200',
            'user_id' => rand(1 , 5),
            'category_id' => rand(1 ,5),
        ];
    }
}
