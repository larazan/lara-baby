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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->foreignId('author_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('rand_id');
            $table->text('body');
            $table->string('original_url')->nullable();
            $table->string('hero_image')->nullable();
            $table->tinyInteger('is_pinned')->default(0);
            $table->bigInteger('view_count')->nullable();
            $table->bigInteger('tweet_id')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('published')->default(false);
            $table->text('article_tags')->nullable();
            $table->string('status',10);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->dateTime('shared_at')->nullable();
            $table->string('original')->nullable();
            $table->string('large')->nullable();
            $table->string('medium')->nullable();
            $table->string('small')->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
