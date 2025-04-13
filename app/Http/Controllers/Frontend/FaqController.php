<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index()
    {
        $faqs = Cache::remember('faqs', now()->addMinutes(30), function () {
            return Faq::select(['question', 'answer', 'order_position'])->orderBy('order_position', 'ASC')->active()->get();
        }); 
        
		$title = "Faqs";
		
		return $this->loadTheme('faqs.index', compact('title', 'faqs'));
    }
}
