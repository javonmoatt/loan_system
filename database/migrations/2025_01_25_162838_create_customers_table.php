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
        Schema::create('customers', function (Blueprint $table) {
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

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('email'); // Index for faster queries on email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
