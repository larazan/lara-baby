<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $languages = [
            [
                'code' => 'en',
                'name' => 'english',
                'icon' => 'gb.svg',
                'rtl' => false,
                'status' => 'active',
            ],
            [
                'code' => 'id',
                'name' => 'indonesian',
                'icon' => 'id.svg',
                'rtl' => false,
                'status' => 'active',
            ],
            [
                'code' => 'zh',
                'name' => 'chinese',
                'icon' => 'cn.svg',
                'rtl' => false,
                'status' => 'active',
            ],
            [
                'code' => 'es',
                'name' => 'spanish',
                'icon' => 'es.svg',
                'rtl' => false,
                'status' => 'active',
            ],
            [
                'code' => 'pt',
                'name' => 'portuguese',
                'icon' => 'pt.svg',
                'rtl' => false,
                'status' => 'active',
            ],
            [
                'code' => 'fr',
                'name' => 'french',
                'icon' => 'fr.svg',
                'rtl' => false,
                'status' => 'active',
            ],
            
        ];

        Language::insert($languages);
    }
}
