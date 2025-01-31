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
        Schema::create('payments', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Loans Table
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // Payment Details
            $table->decimal('amount_due', 15, 2); // Amount due for the payment
            $table->decimal('amount_paid', 15, 2)->default(0.00); // Amount paid (default: 0.00)
            $table->date('due_date'); // Due date for the payment
            $table->date('paid_date')->nullable(); // Date when the payment was made (nullable)
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending'); // Payment status

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('loan_id'); // Index for faster queries on loan_id
            $table->index('status'); // Index for faster queries on status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
