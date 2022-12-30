<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    public static function randomEquipmentName()
    {
        $names = [
            'CrossOver', 'Smith', 'Banco deitado', 'Legpress 45', 'LegPress 90', 'Banco inclinado', 'Banco declinado'
        ];

        $random_int = rand(0, count($names)-1);

        return $names[$random_int];
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => EquipmentFactory::randomEquipmentName()
        ];
    }
}
