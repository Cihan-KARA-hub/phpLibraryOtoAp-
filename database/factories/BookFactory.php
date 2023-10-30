<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booksName'=>fake()->name(),
            'user_id'=>fake()->numberBetween(1,User::count()),
            'rent'=>fake()->boolean()
           
            ,'publication'=>fake()->country()
            ,'author'=>fake()->name(),
            'updated_at' => fake()->dateTime(),
            //
        ];
    }
}
