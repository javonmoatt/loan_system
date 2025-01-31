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
        Schema::create('loan_types', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Loan Type Details
            $table->string('name'); // Name of the loan type (e.g., Personal Loan)
            $table->text('description')->nullable(); // Description of the loan type (optional)
            $table->decimal('interest_rate', 5, 2); // Interest rate for the loan type (e.g., 5.25)
            $table->decimal('min_amount', 15, 2); // Minimum loan amount for the loan type
            $table->decimal('max_amount', 15, 2); // Maximum loan amount for the loan type

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('name'); // Index for faster queries on name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_types');
    }
};
