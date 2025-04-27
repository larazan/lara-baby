<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'Activities',
                'slug' => 'activities',
                'parent_id' => null,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Sensory',
                'slug' => 'sensory',
                'parent_id' => null,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Age',
                'slug' => 'age',
                'parent_id' => null,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Crafts',
                'slug' => 'crafts',
                'parent_id' => null,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Learning',
                'slug' => 'learning',
                'parent_id' => null,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Painting',
                'slug' => 'painting',
                'parent_id' => null,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
// 
            [
                'name' => 'Coloring page',
                'slug' => 'coloring-page',
                'parent_id' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Jokes for kids',
                'slug' => 'jokes-for-kids',
                'parent_id' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Indoor activities',
                'slug' => 'indoor-activities',
                'parent_id' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Outdoor activities',
                'slug' => 'outdoor-activities',
                'parent_id' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Rainy day activities',
                'slug' => 'rainy-day-activities',
                'parent_id' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
// 
            [
                'name' => 'Play Dough',
                'slug' => 'play-dough',
                'parent_id' => 2,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Sensory Bins, Bottles and Bags',
                'slug' => 'sensory-bins-bottles-and-bags',
                'parent_id' => 2,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Slime',
                'slug' => 'slime',
                'parent_id' => 2,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Water Beads',
                'slug' => 'water-beads',
                'parent_id' => 2,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
// 
            [
                'name' => 'Baby',
                'slug' => 'baby',
                'parent_id' => 3,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Toddler',
                'slug' => 'toddler',
                'parent_id' => 3,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Preschooler',
                'slug' => 'preschooler',
                'parent_id' => 3,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Kindergartner',
                'slug' => 'kindergartner',
                'parent_id' => 3,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'big Kid',
                'slug' => 'big-kid',
                'parent_id' => 3,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
// 
            [
                'name' => 'Animal Crafts',
                'slug' => 'animal-crafts',
                'parent_id' => 4,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Cardboard Crafts',
                'slug' => 'cardboard-crafts',
                'parent_id' => 4,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Paper Plate Crafts',
                'slug' => 'paper-plate-crafts',
                'parent_id' => 4,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Pipe Cleaner Crafts',
                'slug' => 'pipe-cleaner-crafts',
                'parent_id' => 4,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
// 
            [
                'name' => 'Colors',
                'slug' => 'colors',
                'parent_id' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Fine Motor Skills',
                'slug' => 'fine-motor-skills',
                'parent_id' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Gross Motor Skills',
                'slug' => 'gross-motor-skills',
                'parent_id' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Letters',
                'slug' => 'letters',
                'parent_id' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Math',
                'slug' => 'math',
                'parent_id' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'STEM',
                'slug' => 'stem',
                'parent_id' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
// 
            [
                'name' => 'Edible Painting',
                'slug' => 'edible-painting',
                'parent_id' => 6,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Rocking Painting',
                'slug' => 'rocking-painting',
                'parent_id' => 6,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Salt Painting',
                'slug' => 'salt-painting',
                'parent_id' => 6,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Watercolor Painting',
                'slug' => 'watercolor-painting',
                'parent_id' => 6,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],

        ];

        Category::insert($data);
    }
}
