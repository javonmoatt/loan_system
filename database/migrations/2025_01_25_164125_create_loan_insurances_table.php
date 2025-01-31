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
        Schema::create('loan_insurances', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Loans Table
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // Insurance Details
            $table->string('provider'); // Name of the insurance provider (e.g., "ABC Insurance")
            $table->string('policy_number'); // Policy number (unique identifier for the insurance policy)
            $table->decimal('premium_amount', 15, 2); // Premium amount for the insurance policy

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('loan_id'); // Index for faster queries on loan_id
            $table->index('provider'); // Index for faster queries on provider
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_insurances');
    }
};
