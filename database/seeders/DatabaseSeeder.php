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
            // CategorySeeder::class,
            // RoleSeeder::class,
            // UserSeeder::class,
            // SettingSeeder::class,
            // ArticleSeeder::class,
            // FaqSeeder::class,
            // SegmentSeeder::class,
            // CategoryArticleSeeder::class,
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
        ]);
        // $this->call(\Database\Seeders\Tables\BabynamesSeeder::class);
    }
}
