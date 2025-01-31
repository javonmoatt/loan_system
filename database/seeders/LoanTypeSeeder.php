<?php

namespace Database\Seeders;

use App\Models\LoanType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of common loan types
        $loanTypes = [
            [
                'name' => 'Personal Loan',
                'description' => 'A loan for personal use such as medical expenses, travel, or debt consolidation.',
                'interest_rate' => 10.5,
                'min_amount' => 1000.00,
                'max_amount' => 50000.00,
            ],
            [
                'name' => 'Home Loan',
                'description' => 'A loan for purchasing or constructing a residential property.',
                'interest_rate' => 7.2,
                'min_amount' => 50000.00,
                'max_amount' => 1000000.00,
            ],
            [
                'name' => 'Car Loan',
                'description' => 'A loan for purchasing a new or used car.',
                'interest_rate' => 8.0,
                'min_amount' => 10000.00,
                'max_amount' => 200000.00,
            ],
            [
                'name' => 'Education Loan',
                'description' => 'A loan for funding higher education or professional courses.',
                'interest_rate' => 9.0,
                'min_amount' => 5000.00,
                'max_amount' => 100000.00,
            ],
            [
                'name' => 'Business Loan',
                'description' => 'A loan for starting or expanding a business.',
                'interest_rate' => 12.0,
                'min_amount' => 20000.00,
                'max_amount' => 500000.00,
            ],
        ];

        // Insert loan types into the database
        foreach ($loanTypes as $loanType) {
            LoanType::create($loanType);
        }
    }
}
