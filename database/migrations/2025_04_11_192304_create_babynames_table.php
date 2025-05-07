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
        Schema::create('babynames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('pronounce')->nullable();
            $table->string('native_name')->nullable();
            $table->text('meaning')->nullable();
            // $table->text('variatons')->nullable();
            $table->integer('gender_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('religion_id')->nullable();
            $table->string('locale')->default('en');
            $table->string('status', 10)->default('active');
            $table->softDeletes();
            $table->timestamps();

            $table->index(['name', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('babynames');
    }
};
