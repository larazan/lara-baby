<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number = 1;

        return [
            // 'activity_id',
            'order_number' => $number++,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(1, true),
            // 'image_path' => $this->faker->image('public/storage/images',400,300, null, false),
        ];
    }
}
