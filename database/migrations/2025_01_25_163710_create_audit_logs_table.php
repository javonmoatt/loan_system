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
        Schema::create('audit_logs', function (Blueprint $table) {
           // Primary Key
           $table->id();

           // Foreign Key to the Users Table (Optional)
           $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');

           // Log Details
           $table->string('action'); // Action performed (e.g., "Loan Approved")
           $table->text('description')->nullable(); // Detailed description of the action
           $table->string('ip_address'); // IP address of the user who performed the action

           // Timestamps
           $table->timestamps(); // Created at and Updated at

           // Indexes
           $table->index('customer_id'); // Index for faster queries on user_id
           $table->index('action'); // Index for faster queries on action
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
