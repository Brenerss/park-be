<?php

namespace Database\Factories;

use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'license_plate' => $faker->regexify('[A-Z]{3}[0-9]{4}'),
            'type' => $faker->randomElement([VehicleType::CAR->value, VehicleType::MOTORCYCLE->value, VehicleType::TRUCK->value]),
            'driver_id' => $faker->randomElement([1, 2, 3])
        ];
    }
}
