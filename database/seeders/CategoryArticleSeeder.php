<?php

namespace Database\Seeders;

use App\Models\CategoryArticle;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'News',
                'slug' => 'news',
                'parent_id' => null,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Pregnancy',
                'slug' => 'pregnancy',
                'parent_id' => null,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Parenting',
                'slug' => 'parenting',
                'parent_id' => null,
                
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'First Trimester',
                'slug' => 'first-trimester',
                'parent_id' => 2,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Second Trimester',
                'slug' => 'second-trimester',
                'parent_id' => 2,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Third Trimester',
                'slug' => 'third-trimester',
                'parent_id' => 2,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Fourth Trimester',
                'slug' => 'fourth-trimester',
                'parent_id' => 2,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Postportum',
                'slug' => 'postportum',
                'parent_id' => 2,
                
                'created_at' => Carbon::now(),
            ],

            [
                'name' => 'Babies',
                'slug' => 'babies',
                'parent_id' => 3,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Toddlers',
                'slug' => 'toddlers',
                'parent_id' => 3,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Big Kids',
                'slug' => 'big-kids',
                'parent_id' => 3,
                
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Tweens & Teens',
                'slug' => 'tweens-and-teens',
                'parent_id' => 3,
                
                'created_at' => Carbon::now(),
            ],
        ];

        CategoryArticle::insert($data);
    }
}




