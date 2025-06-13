<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Activity;
use App\Models\Category;
use App\Models\CategoryArticle;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        // article
        $array = [2, 4, 5, 6];
		$articles = Article::select([ 
            'category_id', 
            'slug', 
            'title', 
            'body', 
            'author_id', 
            'original', 
            'status', 
            'created_at'
            ])->whereNotIn('category_id', $array)->active()->orderBy('created_at', 'DESC')->take(5)->get();

        // activity
        $activities = Activity::select([
            'category_id',
            'author_id',
            'title',
            'body',
            'locale',
            'slug',
            'status',
            'original',
            'created_at'
            ])->active()->take(9)->orderBy('created_at', 'desc')->get();

        // pregnancy
        $pregnancy = Article::select([ 
            'category_id', 
            'slug', 
            'title', 
            'body', 
            'author_id', 
            'original', 
            'status', 
            'created_at'
            ])->whereIn('category_id', $array)->active()->orderBy('created_at', 'DESC')->take(5)->get();


        return $this->loadTheme('home', compact('title', 'articles', 'activities', 'pregnancy'));
    }
}
