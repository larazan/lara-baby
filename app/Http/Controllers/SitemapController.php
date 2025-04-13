<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index()
    {
        $sitemap = Sitemap::create()
        ->add(Url::create('/home'))
        ->add(Url::create('/about'))
        ->add(Url::create('/contact'))
        // ->add(Url::create('/categories'))
        ->add(Url::create('/faqs'))
        ->add(Url::create('/terms'))
        ->add(Url::create('/articles'))
        ->add(Url::create('/privacy-policy'));

        $sitemap->writeTofile(public_path('sitemap-initial.xml'));

        return 'Sitemap Created Succesfully';
    }
}
