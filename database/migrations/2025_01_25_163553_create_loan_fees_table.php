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
        Schema::create('loan_fees', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Loans Table
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // Fee Details
            $table->string('fee_type'); // Type of fee (e.g., processing fee, late fee)
            $table->decimal('amount', 15, 2); // Amount of the fee
            $table->enum('status', ['pending', 'paid'])->default('pending'); // Fee status

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('loan_id'); // Index for faster queries on loan_id
            $table->index('fee_type'); // Index for faster queries on fee_type
            $table->index('status'); // Index for faster queries on status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_fees');
    }
};
