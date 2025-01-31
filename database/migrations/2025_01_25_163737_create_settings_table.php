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
        Schema::create('settings', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Setting Details
            $table->string('key')->unique(); // Unique key for the setting (e.g., "default_interest_rate")
            $table->text('value'); // Value of the setting (e.g., "5.25")

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('key'); // Index for faster queries on key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
