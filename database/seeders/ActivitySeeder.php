<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Material;
use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Activity::factory()
            ->count(86)
            ->has(Material::factory()->count(5), 'materials')
            ->has(Step::factory()->count(5), 'steps')
            ->create();
    }
}
