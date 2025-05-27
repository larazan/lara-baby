<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Country;
use App\Models\Origin;
use App\Models\Religion;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function about()
    {
        $letters = range('A', 'Z');
        $genders = [
            1 => 'male',
            2 => 'female',
            3 => 'unisex',
        ];
        $origins = Origin::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $religions = Religion::select(['id', 'name'])->orderBy('name', 'asc')->get();
        $countries = Country::OrderBy('id', 'asc')->get();

        $page = Setting::where(['key' => 'about_us'])->first();

        $title = "About";
        $page = $page;
		return $this->loadTheme('about.index', compact('title', 'page', 'letters', 'genders', 'origins', 'religions', 'countries'));
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
