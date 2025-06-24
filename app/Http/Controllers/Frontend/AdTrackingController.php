<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Advertising;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdTrackingController extends Controller
{
    //
    public function trackView(Advertising $ad)
    {
        $ad->increment('views');
        return response()->json(['status' => 'view tracked']);
    }

    public function trackClick(Advertising $ad)
    {
        $ad->increment('clicks');
        return response()->json(['status' => 'click tracked']);
    }
}
