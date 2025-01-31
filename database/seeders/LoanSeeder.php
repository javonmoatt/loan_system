<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loan::factory()->count(50)->create(); // Creates 50 fake loans
    }
}
