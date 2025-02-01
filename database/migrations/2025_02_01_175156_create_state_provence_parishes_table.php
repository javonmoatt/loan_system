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
        Schema::create('state_provence_parishes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name', 100); // Name of the state/province/parish
            $table->enum('type', ['state', 'provence', 'parish']); // Type (e.g., "State", "Province", "Parish")
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade'); // Foreign key to countries table
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Soft delete column (optional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_provence_parishes');
    }
};
