<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_id' => \App\Models\Loan::factory(), // Assuming Loan model exists
            'amount_due' => $this->faker->randomFloat(2, 100, 10000),
            'amount_paid' => $this->faker->randomFloat(2, 0, 10000),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'paid_date' => $this->faker->optional(1)->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // 70% chance of being populated
            'status' => $this->faker->randomElement(['pending', 'paid', 'overdue']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
