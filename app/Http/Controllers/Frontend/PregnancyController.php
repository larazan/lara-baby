<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PregnancyController extends Controller
{
    //
    public function index(Request $request, $slug = '')
    {
        $first = range(1, 12);
        $second = range(13, 25);
        $third = range(26, 40);

        $query = Article::select(['title', 'category_id', 'slug', 'title', 'body', 'author_id', 'original', 'status', 'created_at'])->active();
        
        if ($slug) {
            $category = CategoryArticle::where('slug', $slug)->first();
            $cat_id = $category->id;
            $title = $category->name; 
        } else {
            $cat_id = null; 
            $title = "Pregnancy"; 
        }

        $query->when($cat_id > 0, function ($q) use ($cat_id) {
            return $q->where('category_id', '=', $cat_id);
        });

        $articles = $query->paginate(12)->withQueryString();


        return $this->loadTheme('pregnancy.index', compact('title', 'first', 'second', 'third', 'articles'));
    }

    public function tracker($semester)
    {
        $title = 'Pregnancy';

        return $this->loadTheme('pregnancy.tracker', compact('title', 'first', 'second', 'third',));
    }

    public function show()
    {
        $title = 'Pregnancy';

        return $this->loadTheme('pregnancy.detail', compact('title', 'first', 'second', 'third',));
    }
}
