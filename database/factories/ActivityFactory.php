<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(7,3),
            'author_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true),
            'locale' => 'en',
            'slug' => $this->faker->unique()->slug(),
            'rand_id' => Str::random(10),
            'status' => 'active',
            'meta_description' => $this->faker->words(2, true),
        ];
    }
}
