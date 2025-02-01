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
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name', 100)->unique(); // Country name (e.g., "United States")
            $table->char('code', 2)->unique(); // Country code (e.g., "US")
            $table->char('phone_code', 5); // Phone code (e.g., "+1")
            $table->string('currency', 50); // Currency (e.g., "USD")
            $table->char('currency_symbol', 5); // Currency symbol (e.g., "$")
            $table->string('region', 50)->nullable(); // Region (e.g., "Americas")
            $table->string('subregion', 50)->nullable(); // Subregion (e.g., "Northern America")
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Soft delete column (optional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
