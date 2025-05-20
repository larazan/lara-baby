<?php

namespace Database\Seeders;

use App\Models\Religion;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            // 1
            [
                'name' => 'Christianity',
                'created_at' => Carbon::now(),
            ],
            // 2
            [
                'name' => 'Muslim',
                'created_at' => Carbon::now(),
            ],
            // 3
            [
                'name' => 'Hinduism',
                'created_at' => Carbon::now(),
            ],
            // 4
            [
                'name' => 'Buddhism',
                'created_at' => Carbon::now(),
            ],
            // 5
            [
                'name' => 'Judaism',
                'created_at' => Carbon::now(),
            ],
            // 6
            [
                'name' => 'Catholic',
                'created_at' => Carbon::now(),
            ],
            // 7
            [
                'name' => 'Shintoism',
                'created_at' => Carbon::now(),
            ],
            // 8
            [
                'name' => 'Sikhism',
                'created_at' => Carbon::now(),
            ],
            // 9
            [
                'name' => 'Zoroastrianism',
                'created_at' => Carbon::now(),
            ],
        ];

        Religion::insert($data);
    }
}
