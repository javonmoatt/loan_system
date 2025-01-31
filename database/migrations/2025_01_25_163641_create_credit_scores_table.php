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
        Schema::create('credit_scores', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Users Table (Customer)
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            // Credit Score Details
            $table->integer('score'); // Credit score (e.g., 750)
            $table->string('source'); // Source of the credit score (e.g., Equifax, TransUnion)

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('customer_id'); // Index for faster queries on user_id
            $table->index('score'); // Index for faster queries on score
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_scores');
    }
};
