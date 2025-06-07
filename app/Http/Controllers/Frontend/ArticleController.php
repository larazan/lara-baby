<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index($category = '')
	{
		if ($category) {
            $cat = CategoryArticle::where('slug', $category)->first();
            $cat_id = $cat->id;
        } else {
            $cat_id = null; 
        }
		$array = [2, 4, 5, 6];
		$query = Article::select(['title', 'category_id', 'slug', 'title', 'body', 'author_id', 'original', 'status', 'created_at'])->whereNotIn('category_id', $array)->active()->orderBy('created_at', 'DESC');

		$query->when($cat_id > 0, function ($q) use ($cat_id) {
            return $q->where('category_id', '=', $cat_id);
        });

		$articles = $query->paginate(8);

		// $articles = Cache::remember('articles-page-' . request('page', default:1), now()->addHour(), function () {
		// 	return Article::select(['title', 'slug', 'title', 'body', 'author_id', 'status', 'created_at'])->where('status','active')->orderBy('created_at', 'DESC')->paginate(8);
		// });

		$categories = CategoryArticle::select(['name', 'slug'])->get();
		
		$title = "Article";

		return $this->loadTheme('blogs.index', compact('title', 'articles', 'categories'));
    }
    
    public function show($slug)
	{
		$shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();


		$article = Article::select(['id', 'title', 'category_id', 'slug', 'title', 'body', 'author_id', 'meta_title', 'meta_keyword', 'meta_description', 'status', 'created_at', 'updated_at'])->active()->where('slug', $slug)->first();

		if (!$article) {
			return redirect('articles');
		}

		$tags = $article->article_tags;
        if($tags)
        {
            $arrTags = explode(',', $article->article_tags);
        } else {
            $arrTags = $tags;
        }

		$tags = $arrTags;
		$article = $article;

		$limit = 5;
		$array = [2, 4, 5, 6];
        $articles = Article::select(['title', 'slug', 'title', 'category_id', 'body', 'author_id', 'status', 'created_at'])->whereNotIn('category_id', $array)->active()->where('slug', '!=', $slug)->orderBy('id', 'DESC')->latest()->take($limit)->get();

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $article->title;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($article->id);
		$breadcrumbs_data = $breadcrumbs_data;

		$title = $article->title;
		$contents = $this->generateIndex($article->body);

		return $this->loadTheme('blogs.detail', compact('title', 'article', 'articles', 'tags', 'breadcrumbs_data', 'shareComponent', 'contents'));
    }

	public function showByTag($tag)
    {
        $articles = Article::select(['title', 'slug', 'title', 'body', 'author_id', 'article_tags', 'status', 'created_at'])->where('article_tags', 'like', "%{$tag}%")->paginate(8);

        $title = "Topic: " . ucfirst($tag);

		return $this->loadTheme('blogs.index', compact('tag', 'title', 'articles'));
    }
    
    public function _generate_breadcrumbs_array($id) {
		// $homepage_url = url('/');
		// $breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		$sub_cat_title = 'Articles';
		// get sub cat url
		$sub_cat_url = url('articles');
	
		$breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
		return $breadcrumbs_array;
	}

	public function generateIndex($html) {
	    preg_match_all('/<h([1-4])*[^>]*>(.*?)<\/h[1-4]>/',$html,$matches);

	    $index = "";
	    $prev = 2;
		$counter = 0; // Unique link counter

	    foreach ($matches[0] as $i => $match){
	        $curr = $matches[1][$i];
	        $text = strip_tags($matches[2][$i]);
	        $slug = strtolower(str_replace("--","-",preg_replace('/[^\da-z]/i', '-', $text)));
	        // $anchor = '<a name="'.$slug.'">'.$text.'</a>';
	        $anchor = $text;
	        $html = str_replace($text,$anchor,$html);
				
	        // $prev <= $curr ?: $index .= str_repeat('</div>',($prev - $curr));
	        // $prev >= $curr ?: $index .= "<div>";
			$slug2 = strtolower(str_replace("--","",$slug));
	        $index .= '<a href="#'.$slug2.'" class="truncate">• '.$text.'</a>';
					
	        $prev = $curr;
	    }

	    // $index .= "</ul>";

	    return ["html" => $html, "index" => $index];
	}
}
