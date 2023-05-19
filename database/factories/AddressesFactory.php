<?php

namespace Database\Factories;

use App\Models\Customers;
use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'city' => $this->faker->city(),
            'tag' => $this->faker->word(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->buildingNumber(),
            'floor' => $this->faker->numberBetween(1, 20),
            'flat_number' => $this->faker->numberBetween(1, 100),
            'doorphone_code' => $this->faker->numberBetween(1000, 9999),
        ];
    }
}
