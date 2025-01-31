<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'trn' => $this->faker->unique()->numerify('1#######'), // 8-digit TRN
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numerify('876-###-####'), // Jamaican phone number format
            'address' => $this->faker->address(),
            'date_of_birth' => $this->faker->date(), // Random date of birth
            'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed', 'common_law']),
            'number_of_dependents' => $this->faker->numberBetween(0, 10), // Random number of dependents (0 to 10)
        ];
    }
}
