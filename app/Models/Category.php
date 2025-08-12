<?php

namespace App\Models;

use Illuminate\Support\Collection; // Don't forget to import this
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug; // Import HasSlug
use Spatie\Sluggable\SlugOptions; // Import SlugOptions

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSlug;

    public $translatable = ['name'];

    const TABLE = 'categories';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        // 'slug',
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

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

     /**
     * Get the child categories.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'category_id');
    }

    /**
     * Recursively get all descendant categories (children, grandchildren, etc.).
     */
    public function descendants(): HasMany
    {
        return $this->children()->with('descendants');
    }

    /**
     * Get all IDs of this category and its descendants.
     * @return Collection
     */
    public function descendantsAndSelfIds(): Collection
    {
        $ids = new Collection([$this->id]); // Start with the current category's ID

        // Recursively add children's IDs
        $this->children()->get()->each(function ($child) use (&$ids) {
            $ids = $ids->merge($child->descendantsAndSelfIds());
        });

        return $ids;
    }
}