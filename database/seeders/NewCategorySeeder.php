<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'name' => [
                    'en' => 'Activities',
                    'id' => 'Aktifitas',
                ],
                'parent_id' => null,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Sensory',
                    'id' => 'Sensorik',
                ],
                'parent_id' => null,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Age',
                    'id' => 'Umur',
                ],
                'parent_id' => null,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Crafts',
                    'id' => 'Kerajinan',
                ],
                'parent_id' => null,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Learning',
                    'id' => 'Belajar',
                ],
                'parent_id' => null,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Painting',
                    'id' => 'Mewarnai',
                ],
                'parent_id' => null,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Coloring page',
                    'id' => 'Halaman mewarnai',
                ],
                'parent_id' => 1,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Jokes for kids',
                    'id' => 'Candaan untuk anak',
                ],
                'parent_id' => 1,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Indoor activities',
                    'id' => 'Aktifitas dalam ruangan',
                ],
                'parent_id' => 1,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Outdoor activities',
                    'id' => 'Aktifitas luar ruangan',
                ],
                'parent_id' => 1,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Rainy day activities',
                    'id' => 'Aktifitas saat hujan',
                ],
                'parent_id' => 1,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Play Dough',
                    'id' => 'Umur',
                ],
                'parent_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Sensory Bins, Bottles and Bags',
                    'id' => 'Tempat Penyimpanan Sensorik, Botol dan Tas',
                ],
                'parent_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Slime',
                    'id' => 'Slime',
                ],
                'parent_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Water Beads',
                    'id' => 'Manik-manik Air',
                ],
                'parent_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Baby',
                    'id' => 'Bayi',
                ],
                'parent_id' => 3,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Toddler',
                    'id' => 'Balita',
                ],
                'parent_id' => 3,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Preschooler',
                    'id' => 'Prasekolah',
                ],
                'parent_id' => 3,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Kindergartner',
                    'id' => 'TK',
                ],
                'parent_id' => 3,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Big Kid',
                    'id' => 'Anak anak',
                ],
                'parent_id' => 3,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Animal Crafts',
                    'id' => 'Kerajinan Hewan',
                ],
                'parent_id' => 4,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Cardboard Crafts',
                    'id' => 'Kerajinan kardus',
                ],
                'parent_id' => 4,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Paper Plate Crafts',
                    'id' => 'Kerajinan Piring Kertas',
                ],
                'parent_id' => 4,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Pipe Cleaner Crafts',
                    'id' => 'Kerajinan Pembersih Pipa',
                ],
                'parent_id' => 4,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Colors',
                    'id' => 'Warna',
                ],
                'parent_id' => 5,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Fine Motor Skills',
                    'id' => 'Keterampilan Motorik Halus',
                ],
                'parent_id' => 5,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Gross Motor Skills',
                    'id' => 'Keterampilan Motorik Kasar',
                ],
                'parent_id' => 5,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Letters',
                    'id' => 'Huruf',
                ],
                'parent_id' => 5,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Math',
                    'id' => 'Matematika',
                ],
                'parent_id' => 5,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'STEM',
                    'id' => 'STEM',
                ],
                'parent_id' => 5,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Edible Painting',
                    'id' => 'Lukisan dapat dimakan',
                ],
                'parent_id' => 6,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Rocking Painting',
                    'id' => 'Lukisan Batu',
                ],
                'parent_id' => 6,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Salt Painting',
                    'id' => 'Lukisan Garam',
                ],
                'parent_id' => 6,
                'status' => 'active',
            ],
            [
                'name' => [
                    'en' => 'Watercolor Painting',
                    'id' => 'Lukisan Cat Air',
                ],
                'parent_id' => 6,
                'status' => 'active',
            ],
        ];


        foreach ($categories as $categoryData) {
            Category::create($categoryData);
            // The slug will be automatically generated by the HasSlug trait
        }
    }
}
