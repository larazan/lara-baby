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
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            // Foreign key to the receipts table, set to cascade delete
            $table->foreignId('activity_id')->constrained()->onDelete('cascade');
            $table->integer('step_number'); // Order of the instruction step
            $table->string('title')->nullable();
            $table->text('description')->nullable(); // Instruction description
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
