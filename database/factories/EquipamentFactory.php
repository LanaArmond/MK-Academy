<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipament>
 */
class EquipamentFactory extends Factory
{

    public function randomName()
    {
        $equipaments = [
            'supina reto', 'supino inclinado', 'Alter', 'Barra', 'Rosca', 'Esteira', 'Bola de Yoga', 'Paralela', 'legpress 90', 'legpress 180', 'legpress 45', 'crossover', 'Scott',
        ];

        $random_int = rand(0, count($equipaments)-1);

        return $equipaments[$random_int];
    }
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => EquipamentFactory::randomName(),
            'number' => rand(1, 50),
            'image' => $this->faker->sentence(1),
        ];
    }
}
