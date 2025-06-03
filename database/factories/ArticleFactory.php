<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'category_id' => 1,
        //     'author_id' => User::factory(),
        //     'title' => $this->faker->sentence(),
        //     'body' => $this->faker->paragraphs(3, true),
        //     'slug' => $this->faker->unique()->slug(),
        //     'rand_id' => Str::random(10),
        //     'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        //     'published' => true,
        //     'status' => 'active',
        //     'article_tags' => 'news, test, first',
        //     'meta_title' => $this->faker->words(5, true),
        //     'meta_keyword' => $this->faker->words(5, true),
        //     'meta_description' => $this->faker->words(5, true),
        //     'view_count' => $this->faker->numberBetween(0, 1000),
        // ];

        static $number = 1;
        static $week = 1;
        return [
            'category_id' => 3,
            'author_id' => User::factory(),
            'title' => 'Week '.$number++.' of Pregnancy',
            'body' => $this->faker->paragraphs(3, true),
            'slug' => 'week-'.$week++,
            'rand_id' => Str::random(10),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'published' => true,
            'status' => 'active',
            // 'article_tags' => 'news, test, first',
            'meta_title' => $this->faker->words(5, true),
            'meta_keyword' => $this->faker->words(5, true),
            'meta_description' => $this->faker->words(5, true),
            'view_count' => $this->faker->numberBetween(0, 1000),
        ];
    }

    public function approved(): self
    {
        return $this->state(function (): array {
            return [
                'approved_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            ];
        });
    }

    public function unapproved(): self
    {
        return $this->state(function (): array {
            return [
                'approved_at' => null,
            ];
        });
    }
}
