<?php

namespace Database\Seeders;

use App\Models\Babyname;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HamariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            
        ];

        DB::table("babynames")->insert($data);
    }
}
