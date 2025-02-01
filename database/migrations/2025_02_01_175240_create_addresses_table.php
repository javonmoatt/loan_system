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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->enum('type',['home', 'work', 'emergency']);
            $table->string('street_address_line_1', 255); // Street address
            $table->string('street_address_line_2', 255); // Street address
            $table->string('city', 100); // City
            // Foreign key to state_province_parishes table
            $table->foreignId('state_province_parish_id')->constrained('state_province_parishes')->onDelete('cascade');
            // Foreign key to postal_codes table
            $table->foreignId('postal_code_id')->constrained('postal_codes')->onDelete('cascade');
            // Foreign key to countries table
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
