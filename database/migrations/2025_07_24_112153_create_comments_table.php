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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // The comment content
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // For registered users
            $table->string('guest_name')->nullable(); // For guest comments
            $table->string('guest_email')->nullable(); // For guest comments

            // Polymorphic columns
            $table->morphs('commentable'); // This creates commentable_id (unsignedBigInteger) and commentable_type (string)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
