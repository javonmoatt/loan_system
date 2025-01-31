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
        Schema::create('applications', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Customer Details
            $table->string('firstname', length: 100); // First name of the customer
            $table->string('lastname', length: 100); // Last name of the customer
            $table->string('trn', length: 9)->unique()->nullable(); // Tax Registration Number of the customer
            $table->string('email', length: 100)->unique()->nullable(); // Email address (unique)
            $table->string('phone', length: 11)->nullable(); // Phone number (optional)
            $table->text('address')->nullable(); // Address (optional)
            $table->date('date_of_birth')->nullable(); // Date of birth of the customer
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed', 'common_law'])
                    ->default('single')->nullable(); // Default status is 'single'
            $table->decimal('number_of_dependents', total: 2, places: 0)->nullable(); // Number of dependents of the customer

            //Employment Information
            $table->string('current_employer', length: 200); // Customer Employer
            $table->string('job_title', length: 200); // Applicant Job title
            $table->date('employment_start_date')->nullable(); // Applicant employment start date
            $table->decimal('monthly_income', 5, 2); // Employment Income
            $table->text('employer_address')->nullable(); // Address (optional)
            $table->string('work_phone', length: 11)->nullable(); // Phone number (optional)
            $table->boolean('self_employed')->default(false);

            // Financial Information
            $table->decimal('total_monthly_expenses', 15, 2); // Loan amount requested
            $table->decimal('total_monthly_debt_obligations', 15, 2); // Loan amount requested
            $table->decimal('desired_loan_amount', 15, 2); // Loan amount requested
            $table->text('purpose')->nullable(); // Purpose of the loan (optional)
            $table->integer('term'); // Loan term in months
            $table->enum('desired_payment_frequency', ['monthly','weekly','fortnightly'])
            ->default('monthly')->nullable();

            // Application Status
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending'); // Default status is 'pending'

            // References
            $table->string('reference_1_name', length: 100)->nullable(); //
            $table->string('reference_1_phone', length: 11)->nullable(); //
            $table->string('reference_2_name', length: 100)->nullable(); //
            $table->string('reference_2_phone', length: 11)->nullable(); //

            //Banking Information
            $table->string('bank_name', length: 100)->nullable();
            $table->string('bank_branch', length: 100)->nullable();
            $table->string('account_number', length: 100)->nullable();
            $table->string('routing_number', length: 100)->nullable();
            $table->enum('account_type', ['saving','chequing'])
            ->default('saving')->nullable();

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('status'); // Index for faster queries on status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
