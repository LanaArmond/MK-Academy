<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    public static function random_identifier()
    {
        $identifiers = ['A', 'B', 'C', 'D', 'E', 'F'];


        $random_int = rand(0, count($identifiers)-1);

        return $identifiers[$random_int];
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identifier' => CardFactory::random_identifier()
        ];
    }
}
