<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'numero' => $this->faker->numerify('06########'),
            'adresse' => $this->faker->address,
            'date_naissance' => $this->faker->date,
        ];
    }
}
