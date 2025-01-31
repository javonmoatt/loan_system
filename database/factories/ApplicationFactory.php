<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'trn' => $this->faker->unique()->numerify('########'), // 8-digit TRN
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'date_of_birth' => $this->faker->date(),
            'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed', 'common_law']),
            'number_of_dependents' => $this->faker->numberBetween(0, 10),
            'current_employer' => $this->faker->company,
            'job_title' => $this->faker->jobTitle,
            'employment_start_date' => $this->faker->date(),
            'monthly_income' => $this->faker->randomFloat(2, 1000, 10000),
            'employer_address' => $this->faker->address,
            'work_phone' => $this->faker->phoneNumber,
            'self_employed' => $this->faker->boolean,
            'total_monthly_expenses' => $this->faker->randomFloat(2, 500, 5000),
            'total_monthly_debt_obligations' => $this->faker->randomFloat(2, 0, 2000),
            'desired_loan_amount' => $this->faker->randomFloat(2, 1000, 50000),
            'purpose' => $this->faker->sentence,
            'term' => $this->faker->numberBetween(6, 60), // Loan term in months (6 to 60 months)
            'desired_payment_frequency' => $this->faker->randomElement(['monthly', 'weekly', 'fortnightly']),
            'reference_1_name' => $this->faker->name,
            'reference_1_phone' => $this->faker->phoneNumber,
            'reference_2_name' => $this->faker->name,
            'reference_2_phone' => $this->faker->phoneNumber,
            'bank_name' => $this->faker->company,
            'bank_branch' => $this->faker->city,
            'account_number' => $this->faker->bankAccountNumber,
            'routing_number' => $this->faker->numerify('#########'), // 9-digit routing number
            'account_type' => $this->faker->randomElement(['saving', 'chequing']),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
