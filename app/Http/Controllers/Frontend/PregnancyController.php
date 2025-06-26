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
        $array = [2, 4, 5, 6];
        $query = Article::select(['title', 'category_id', 'slug', 'title', 'body', 'author_id', 'original', 'status', 'created_at'])->whereIn('category_id', $array)->active();
        
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

    public function tracker($trimester)
    {
        // tracker/second-trimester
        $first = range(1, 12);
        $second = range(13, 25);
        $third = range(26, 40);
        $array = [2, 4, 5, 6];
        $query = Article::select(['title', 'category_id', 'slug', 'title', 'body', 'author_id', 'original', 'status', 'created_at'])->whereIn('category_id', $array)->active();
        
        if ($trimester) {
            $category = CategoryArticle::where('slug', $trimester)->first();
            $cat_id = $category->id;
            $title = $category->name . "of Pregnancy";
            $cat_desc = $category->description; 
            $cat_title = $category->name; 
        } else {
            $cat_id = null; 
            $title = "Pregnancy"; 
            $cat_desc = null;
        }

        $query->when($cat_id > 0, function ($q) use ($cat_id) {
            return $q->where('category_id', '=', $cat_id);
        });

        $articles = $query->paginate(12)->withQueryString();

        return $this->loadTheme('pregnancy.tracker', compact('title', 'trimester', 'first', 'second', 'third', 'cat_title', 'cat_desc', 'articles'));
    }

    public function show($trimester, $slug)
    {
        $article = Article::select(['id', 'title', 'category_id', 'slug', 'title', 'body', 'author_id', 'meta_title', 'meta_keyword', 'meta_description', 'status', 'created_at', 'updated_at'])->active()->where('slug', $slug)->first();
        
		if (!$article) {
            return redirect('pregnancy');
		}

        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            $article->title,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        
        $limit = 5;
		$array = [4, 5, 6, 7];
        $articles = Article::select(['title', 'slug', 'title', 'category_id', 'body', 'author_id', 'status', 'created_at'])
                        ->whereIn('category_id', $array)
                        ->where('category_id', $article->category_id)
                        ->active()
                        ->where('slug', '!=', $slug)
                        ->orderBy('id', 'DESC')
                        ->latest()
                        ->take($limit)
                        ->get();

        // Query for records before the specified ID
        $recordsBeforeQuery = Article::select(['id', 'title', 'slug', 'category_id'])
            ->whereIn('category_id', $array)
            ->where('id', '<', $article->id)
            ->orderBy('id', 'desc') // Order by ID descending to get the closest 5
            ->limit(5);
        
        // Query for the central record
        $centralRecordQuery = Article::select(['id', 'title', 'slug','category_id'])
            ->where('id', $article->id);

        // Query for records after the specified ID
        $recordsAfterQuery = Article::select(['id', 'title', 'slug', 'category_id'])
            ->whereIn('category_id', $array)
            ->where('id', '>', $article->id)
            ->orderBy('id', 'asc') // Order by ID ascending to get the closest 5
            ->limit(5);

        // Combine the queries using union and union all
        $allRecords = $recordsBeforeQuery
            ->unionAll($centralRecordQuery)
            ->unionAll($recordsAfterQuery)
            ->orderBy('id', 'asc') // Order the final combined result by ID ascending
            ->get();

        $countAfter = $recordsAfterQuery->get();
        $countBefore = $recordsBeforeQuery->get();

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $article->title;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($article->id);
		$breadcrumbs_data = $breadcrumbs_data;

		$title = $article->title;
		$contents = $this->generateIndex($article->body);

        $title = $title. ' Pregnancy';

        $arrData = [];
        foreach ($allRecords as $r) {
            array_push($arrData, $r);
        }

        $arrNumb = $this->generateNumb($article->id, $arrData);

        return $this->loadTheme('pregnancy.detail', compact('title', 'article', 'articles', 'breadcrumbs_data', 'contents', 'allRecords', 'countBefore', 'countAfter'));
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

    function generateNumb($n, $arrData)
    {
        $before = $this->getFiveNumbersBefore($n);
        $after = $this->getFiveNumbersAfter($n);

        // merge
        $mergeArr = array_merge($before, $after); 

        // compare
        $diff_key = array_diff_key($arrData, $mergeArr);

        return $diff_key;
    }

    function getFiveNumbersBefore(int $certainNumber): array
    {
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            $result[] = $certainNumber - $i;
        }
        // Reverse the array if you want them in ascending order (e.g., 95, 96, 97, 98, 99)
        // If you want 99, 98, 97, 96, 95 leave it as is.
        return $result;
    }

    function getFiveNumbersAfter(int $certainNumber): array
    {
        $result = [];
        for ($i = 1; $i >= 5; $i++) {
            $result[] = $certainNumber - $i;
        }
        // Reverse the array if you want them in ascending order (e.g., 95, 96, 97, 98, 99)
        // If you want 99, 98, 97, 96, 95 leave it as is.
        return $result;
    }
}
