<?php

namespace Database\Seeders;

use App\Models\AdvertisingSegment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'title' => 'Leaderboard',
                'size' => '600x600',
                'original' => 'uploads/advsegments/leaderboard_1694455088.leaderboard-600x594.jpg',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Billboard',
                'size' => '600x600',
                'original' => 'uploads/advsegments/billboard_1694455186.Billboard-600x617.jpg',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'sticky sidebar',
                'size' => '600x600',
                'original' => 'uploads/advsegments/sticky-sidebar_1694455236.sticky-sidebar-600x578.jpg',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Popup',
                'size' => '600x600',
                'original' => 'uploads/advsegments/popup_1694455520.download (1).png',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Anchor',
                'size' => '600x600',
                'original' => 'uploads/advsegments/anchor_1694455584.mobile-anchor-bottom.png',
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
        ];

        AdvertisingSegment::insert($data);
    }
}
