<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug; // Import HasSlug
use Spatie\Sluggable\SlugOptions; // Import SlugOptions

class CategoryArticle extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSlug;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        // 'slug',
        'description',
        'parent_id',
        'status',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name') // Generate slug from the 'name' attribute (translatable)
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate(); // Optional: only generate on creation
    }

    /**
     * Get the route key for the model.
     * This tells Laravel to use the 'slug' column for route model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function slug(): string
    // {
    //     return $this->slug;
    // }

    public function parent() {
        return $this->belongsTo(CategoryArticle::class, 'parent_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}