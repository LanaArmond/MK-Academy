<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name(),
            'email' => $this->faker->email(),
            'cpf' => rand(10000000000, 99999999999),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'number' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
            'registration_date' => $this->faker->date(),
            'type' => User::CLIENT,
            'status' => "1",
        ];
    }
}
