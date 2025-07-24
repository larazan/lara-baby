<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           
            // NewCategorySeeder::class,
            // RoleSeeder::class,
            // UserSeeder::class,
            // SettingSeeder::class,
            // ArticleSeeder::class,
            // FaqSeeder::class,
            // SegmentSeeder::class,
            // NewCategoryArticleSeeder::class,
            // LanguageSeeder::class,
            // NewsletterSeeder::class,
            // ContactSeeder::class,
            // CountrySeeder::class,
            // ReligionSeeder::class,
            // OriginSeeder::class,

            // ActivitySeeder::class,
            PregnancySeeder::class,
            // EmmasdiarySeeder::class,
            // HamariSeeder::class,

            // NamelistSeeder::class,
            // NamelistCowokSeeder::class,

            // BabynameSeeder::class,
            // BabynameCewekSeeder::class,
            // BabynameCowokSeeder::class,
            // BabynameCowokIslamSeeder::class,
            // BabynameCowokEstetikSeeder::class,

            // BabynameCewekModern::class,
            // BabynameCewekUni::class,
            // BabynameCowokUni::class,
            // NamelistCewekUni::class,
            // NamelistCowok::class,

        ]);
        // $this->call(\Database\Seeders\Tables\BabynamesSeeder::class);
    }
}
