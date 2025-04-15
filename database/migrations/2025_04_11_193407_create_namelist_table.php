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
        Schema::create('namelist', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('native_name')->nullable();
            $table->text('meaning')->nullable();
            $table->integer('gender_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('religion_id')->nullable();
            $table->string('status', 10)->default('active');
            $table->timestamps();

            $table->index(['full_name', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namelist');
    }
};
