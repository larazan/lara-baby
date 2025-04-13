<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function about()
    {
        $page = Setting::where(['key' => 'about_us'])->first();

        $this->data['title'] = "About";
        $this->data['page'] = $page;
		return $this->loadTheme('about.index', $this->data);
    }

    public function advertising()
    {
        $title = "Advertise";

        return $this->loadTheme('advertising.index', compact('title'));
    }

    public function terms()
    {
        $page = Setting::where(['key' => 'terms_and_conditions'])->first();

        $this->data['title'] = "Term and Conditions";
        $this->data['page'] = $page;
		return $this->loadTheme('terms.index', $this->data);
    }

    public function policy()
    {
        $page = Setting::where(['key' => 'privacy_policy'])->first();

        $this->data['title'] = "Policy";
        $this->data['page'] = $page;
		return $this->loadTheme('policy.index', $this->data);
    }
}
