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
            CategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            ArticleSeeder::class,
            FaqSeeder::class,
            SegmentSeeder::class,
            CategoryArticleSeeder::class,
            languageSeeder::class,
            NewsletterSeeder::class,
            ContactSeeder::class,
            CountrySeeder::class,
            ReligionSeeder::class,
            BabynameSeeder::class,
            NamelistSeeder::class,
        ]);
    }
}
