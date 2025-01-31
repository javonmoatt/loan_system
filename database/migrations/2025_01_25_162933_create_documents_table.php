<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Loans Table
            $table->foreignId('loan_id')->constrained()->onDelete('cascade')->nullable();

            // Foreign Key to the Customers Table
            $table->foreignId('customer_id')->constrained()->onDelete('cascade')->nullable();

            // Document Details
            $table->string('document_type'); // Type of document (e.g., ID, proof of income)
            $table->string('file_path'); // Path to the uploaded file

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('loan_id'); // Index for faster queries on loan_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
