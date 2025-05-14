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
            [
                'name' => 'Christianity',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Muslim',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Hinduism',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Buddhism',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Judaism',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Catholic',
                'created_at' => Carbon::now(),
            ],
        ];

        Religion::insert($data);
    }
}
