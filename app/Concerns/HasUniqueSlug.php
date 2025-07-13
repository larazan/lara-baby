<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUniqueSlug
{
    /**
     * Boot the HasSlug trait.
     * This method is automatically called by Laravel when the trait is used on a model.
     *
     * @return void
     */
    protected static function bootHasUniqueSlug(): void
    {
        // When a model is being created, generate and set its slug
        static::creating(function (Model $model) {
            // Check if a slug is already provided (e.g., by manual input)
            // or if the model has a getSlugSource method defined
            $slugSource = method_exists($model, 'getSlugSource') ? $model->getSlugSource() : 'title';

            if (empty($model->{$model->getSlugField()}) && !empty($model->{$slugSource})) {
                $model->{$model->getSlugField()} = $model->generateUniqueSlug(Str::slug($model->{$slugSource}));
            }
        });

        // When a model is being updated, potentially update its slug
        static::updating(function (Model $model) {
            $slugField = $model->getSlugField();
            $slugSource = method_exists($model, 'getSlugSource') ? $model->getSlugSource() : 'title';

            // Only update the slug if the source attribute (e.g., 'title') has changed
            // and the slug itself hasn't been manually altered.
            if ($model->isDirty($slugSource) && !$model->isDirty($slugField)) {
                $model->{$slugField} = $model->generateUniqueSlug(Str::slug($model->{$slugSource}), $model->getKey());
            }
        });
    }

    /**
     * Get the name of the attribute to use as the slug source.
     * Override this method in your model if the source is not 'title'.
     *
     * @return string
     */
    protected function getSlugSource(): string
    {
        return 'name'; // Default slug source
    }

    /**
     * Get the name of the attribute to store the slug.
     * Override this method in your model if the slug field is not 'slug'.
     *
     * @return string
     */
    protected function getSlugField(): string
    {
        return 'slug'; // Default slug field
    }

    /**
     * Generate a unique slug for the model.
     *
     * @param string $originalSlug The slug to start with
     * @param mixed|null $ignoreId Optional ID to ignore when checking uniqueness (for updates)
     * @return string
     */
    protected function generateUniqueSlug(string $originalSlug, mixed $ignoreId = null): string
    {
        $slug = $originalSlug;
        $i = 1;
        $slugField = $this->getSlugField();

        while (
            static::query()
                ->where($slugField, $slug)
                ->when($ignoreId, fn ($query) => $query->where($this->getKeyName(), '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $i++;
        }

        return $slug;
    }
}