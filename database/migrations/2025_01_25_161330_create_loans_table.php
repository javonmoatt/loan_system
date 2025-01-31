<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Users Table (Customer)
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            // Loan Details
            $table->date('activation_date')->nullable(); // Start date of the loan
            $table->decimal('loan_amount', 15, 2)->nullable(); // Loan amount (e.g., 10000.00)
            $table->decimal('interest_rate', 5, 2)->nullable(); // Interest rate (e.g., 5.25)
            $table->decimal('penalty_rate', 5, 2)->nullable(); // Penalty rate (e.g., 5.25)
            $table->decimal('number_of_installments', 5, 0)->nullable(); // Installment number (e.g., 10)
            $table->enum('repayment_frequency', ['monthly','weekly','fortnightly'])
                ->default('monthly')->nullable();
            $table->integer('term'); // Loan term in months (e.g., 12)
            $table->text('purpose')->nullable(); // Purpose of the loan (optional)
            $table->enum('currency', ['jmd', 'cad', 'usd', 'kyd', 'eur'])
                    ->default('jmd')->nullable(); // Default status is 'jmd'
            $table->enum('interest_calculation_method', ['fixed', 'declining_balance', 'declining_balance_equal_installment'])
                    ->default('fixed')->nullable(); // Default status is 'jmd'

            // Loan Status
            $table->enum('status', ['pending', 'approved', 'rejected', 'disbursed', 'completed'])
                    ->default('pending')->nullable(); // Default status is 'pending'

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('customer_id'); // Index for faster queries on customer_id
            $table->index('status'); // Index for faster queries on status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
