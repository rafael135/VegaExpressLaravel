<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::all()->random(),
            "cep" => $this->faker->numberBetween(11111111, 99999999),
            "bairro" => $this->faker->address(),
            "rua" => $this->faker->streetAddress(),
            "numero" => $this->faker->numberBetween(1, 999)
        ];
    }
}
