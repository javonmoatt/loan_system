<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(), // Assuming User model exists
            'activation_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'loan_amount' => $this->faker->randomFloat(2, 1000, 100000),
            'interest_rate' => $this->faker->randomFloat(2, 1, 20),
            'penalty_rate' => $this->faker->randomFloat(2, 1, 10),
            'number_of_installments' => $this->faker->numberBetween(1, 60),
            'repayment_frequency' => Arr::random(['monthly', 'weekly', 'fortnightly']),
            'term' => $this->faker->numberBetween(1, 60), // Loan term in months
            'purpose' => $this->faker->sentence,
            'currency' => Arr::random(['jmd', 'cad', 'usd', 'kyd', 'eur']),
            'interest_calculation_method' => Arr::random(['fixed', 'declining_balance', 'declining_balance_equal_installment']),
            'status' => Arr::random(['pending', 'approved', 'rejected', 'disbursed', 'completed']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
