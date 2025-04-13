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
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('segment_id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->string('url')->nullable();
            $table->string('original')->nullable();
            $table->string('small')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('segment_id')->references('id')->on('advertising_segments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisings');
    }
};
