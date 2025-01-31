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
        Schema::create('notifications', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key to the Users Table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Notification Details
            $table->string('type'); // Type of notification (e.g., email, sms)
            $table->text('message'); // Notification message
            $table->enum('status', ['pending', 'sent', 'failed'])->default('pending'); // Notification status

            // Timestamps
            $table->timestamps(); // Created at and Updated at

            // Indexes
            $table->index('user_id'); // Index for faster queries on user_id
            $table->index('status'); // Index for faster queries on status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
