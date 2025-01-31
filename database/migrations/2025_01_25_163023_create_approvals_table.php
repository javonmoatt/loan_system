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
        Schema::create('approvals', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Loans Table
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // Foreign Key to the Applications Table
            $table->foreignId('application_id')->constrained()->onDelete('cascade');

            // Foreign Key to the Users Table (Approver)
            $table->foreignId('first_approver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('second_approver_id')->constrained('users')->onDelete('cascade');

            // Foreign Key to the Users Table (Requester)
            $table->foreignId('requested_by')->constrained('users')->onDelete('cascade');

            // Approval Details
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Approval status
            $table->text('comments')->nullable(); // Comments from the approver

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('loan_id'); // Index for faster queries on loan_id
            $table->index('approver_id'); // Index for faster queries on approver_id
            $table->index('status'); // Index for faster queries on status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
