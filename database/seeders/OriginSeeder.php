<?php

namespace Database\Seeders;

use App\Models\Origin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'African',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            // 2
            [
                'name' => 'Arabic',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'American',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            // 4
            [
                'name' => 'English',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            // 5
            [
                'name' => 'Indonesian',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            // 6
            [
                'name' => 'Sanskrit',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Korean',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            // 8
            [
                'name' => 'Japanese',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Roman',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            // 10
            [
                'name' => 'Russian',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Hindi',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
        ];

        Origin::Insert($data);
    }
}
