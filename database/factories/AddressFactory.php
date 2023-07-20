<?php

namespace Database\Factories;

use Faker\Provider\pt_BR\Address;
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
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'street' => $faker->streetAddress(),
            'number' => $faker->buildingNumber(),
            'complement' => "",
            'neighborhood' => $faker->city(),
            'zipcode' => $faker->bothify("#######")
        ];
    }
}
