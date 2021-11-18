<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'id' => $this->faker->unique()->randomNumber,
            'name' => $this->faker->unique()->word, // A single unique word
            'category' => $this->faker->unique()->randomNumber, // A single unique word
            'url' => $this->faker->word // A single unique word

        ];
    }
}