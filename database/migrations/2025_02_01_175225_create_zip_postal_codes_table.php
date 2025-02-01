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
        Schema::create('zip_postal_codes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('code', 20); // ZIP or postal code (e.g., "90210" or "K1A 0B1")
            $table->string('name', 100); // City name (e.g., "Los Angeles")
            $table->foreignId('state_province_parish_id')->constrained('state_province_parishes')->onDelete('cascade'); // Foreign key to state_province_parishes table
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Soft delete column (optional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zip_postal_codes');
    }
};
