<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $phoneNumber = str_replace(['(', ')', '-', ' '], '', $faker->phoneNumber());

        return [
            'name' => "{$faker->firstName()} {$faker->lastName()}",
            'phone_number' => $phoneNumber
        ];
    }
}
