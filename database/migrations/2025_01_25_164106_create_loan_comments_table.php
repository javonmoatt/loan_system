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
        Schema::create('loan_comments', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Loans Table
            $table->foreignId('loan_id')->constrained()->onDelete('cascade');

            // Foreign Key to the Users Table (Commenter)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Comment Details
            $table->text('comment'); // The comment or note

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('loan_id'); // Index for faster queries on loan_id
            $table->index('user_id'); // Index for faster queries on user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_comments');
    }
};
