<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create('pt_BR');
        return [
            'name' => $faker->unique()->word,
            'description' => $faker->text(),
            'seriesNumber' => random_int(1, 10),
            'repetitionNumber' =>  random_int(1, 25),
            'tutorialVideo' => $faker->url()
        ];
    }
}
