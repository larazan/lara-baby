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
        $pregData = [
            [
                'color' => '#c3dea7',
                'height' => null,
                'weight' => null,
                'fruit' => '',
            ],
            [
                'color' => '#c3dea7',
                'height' => null,
                'weight' => null,
                'fruit' => '',
            ],
            [
                'color' => '#ffcc46',
                'height' => null,
                'weight' => null,
                'fruit' => '',
            ],
            [
                'color' => '#8a5298',
                'height' => null,
                'weight' => null,
                'fruit' => '',
            ],
            [
                'color' => '#769cc3',
                'height' => null,
                'weight' => null,
                'fruit' => '',
            ],
            [
                'color' => '#e8e757',
                'height' => 0.13,
                'weight' => null,
                'fruit' => 'appleseed',
            ],
            [
                'color' => '#c3dfa5',
                'height' => 0.25,
                'weight' => null,
                'fruit' => 'sweet pea',
            ],
            [
                'color' => '#879ec7',
                'height' => 0.51                ,
                'weight' => null,
                'fruit' => 'blueberry',
            ],
            [
                'color' => '#ff6d6d',
                'height' => 0.63,
                'weight' => 0.04,
                'fruit' => 'raspberry',
            ],
            [
                'color' => '#ef8f91',
                'height' => 0.9,
                'weight' => 0.07,
                'fruit' => 'cherry',
            ],
            [
                'color' => '#e7828a',
                'height' => 1.2,
                'weight' => 0.14,
                'fruit' => 'strawberry',
            ],
            [
                'color' => '#406230',
                'height' => 1.6,
                'weight' => 0.25,
                'fruit' => 'lime',
            ],
            [
                'color' => '#8f539d',
                'height' => 2.1,
                'weight' => 0.49,
                'fruit' => 'plum',
            ],
            [
                'color' => '#82b1a1',
                'height' => 2.9,
                'weight' => 0.81,
                'fruit' => 'lemon',
            ],
            [
                'color' => '#8fc75b',
                'height' => 3.4,
                'weight' => 1.5,
                'fruit' => 'peach',
            ],
            [
                'color' => '#93d6e0',
                'height' => 4,
                'weight' => 2.5,
                'fruit' => 'orange',
            ],
            [
                'color' => '#c4dfa8',
                'height' => 4.6,
                'weight' => 3.5,
                'fruit' => 'avocado',
            ],
            [
                'color' => '#f695a4',
                'height' => 5.1,
                'weight' => 5.9,
                'fruit' => 'pomegranate',
            ],
            [
                'color' => '#8d549b',
                'height' => 5.6,
                'weight' => 6.7,
                'fruit' => 'artichoke',
            ],
            [
                'color' => '#48a698',
                'height' => 6,
                'weight' => 8.5,
                'fruit' => 'mango',
            ],
            [
                'color' => '#92d6df',
                'height' => 6.5,
                'weight' => 10.2,
                'fruit' => 'banana',
            ],
            [
                'color' => '#c4dfaa',
                'height' => 10.5,
                'weight' => 12.7,
                'fruit' => 'endive',
            ],
            [
                'color' => '#da7607',
                'height' => 10.9,
                'weight' => 15.2,
                'fruit' => 'coconut',
            ],
            [
                'color' => '#ee7f8f',
                'height' => 11.4,
                'weight' => 1.1,
                'fruit' => 'grapefruit',
            ],
            [
                'color' => '#a3ced4',
                'height' => 11.8,
                'weight' => 1.3,
                'fruit' => 'cantaloupe',
            ],
            [
                'color' => '#90549e',
                'height' => 13.6,
                'weight' => 1.5,
                'fruit' => 'cauliflower',
            ],
            [
                'color' => '#c4dfaa',
                'height' => 14,
                'weight' => 1.7,
                'fruit' => 'kale',
            ],
            [
                'color' => '#e7e763',
                'height' => 14.4,
                'weight' => 1.9,
                'fruit' => 'lettuce',
            ],
            [
                'color' => '#79648b',
                'height' => 14.8,
                'weight' => 2.2,
                'fruit' => 'eggplant',
            ],
            [
                'color' => '#5aa3ed',
                'height' => 15.2,
                'weight' => 2.5,
                'fruit' => 'acorn squash',
            ],
            [
                'color' => '#e7e763',
                'height' => 15.7,
                'weight' => 2.9,
                'fruit' => 'zucchini',
            ],
            [
                'color' => '#ab79b4',
                'height' => 16.2,
                'weight' => 3.3,
                'fruit' => 'asparagus',
            ],
            [
                'color' => '#56a671',
                'height' => 16.7,
                'weight' => 3.8,
                'fruit' => 'squash',
            ],
            [
                'color' => '#67998d',
                'height' => 17.2,
                'weight' => 4.2,
                'fruit' => 'celery',
            ],
            [
                'color' => '#ffcb47',
                'height' => 17.7,
                'weight' => 4.7,
                'fruit' => 'butternut squash',
            ],
            [
                'color' => '#8eceb6',
                'height' => 18.2,
                'weight' => 5.3,
                'fruit' => 'pineapple',
            ],
            [
                'color' => '#fdd168',
                'height' => 18.7,
                'weight' => 5.8,
                'fruit' => 'papaya',
            ],
            [
                'color' => '#f8e877',
                'height' => 19.1,
                'weight' => 6.3,
                'fruit' => 'romaine lettuce',
            ],
            [
                'color' => '#689a8e',
                'height' => 19.6,
                'weight' => 6.8,
                'fruit' => 'winter melon',
            ],
            [
                'color' => '#a6d8c3',
                'height' => 20,
                'weight' => 7.3,
                'fruit' => 'pumpkin',
            ],
            [
                'color' => '#e98788',
                'height' => 20.2,
                'weight' => 7.6,
                'fruit' => 'watermelon',
            ],
            [
                'color' => '#e98788',
                'height' => 20.4,
                'weight' => 7.9,
                'fruit' => 'watermelon',
            ],
            [
                'color' => '#e98788',
                'height' => 20.3,
                'weight' => 8.1,
                'fruit' => 'watermelon',
            ],
        ];

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

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $article->title;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($article->id);
		$breadcrumbs_data = $breadcrumbs_data;

		$title = $article->title;
		$contents = $this->generateIndex($article->body);

        $title = $title. ' Pregnancy';

        $arrData = [];
        foreach ($allRecords as $r) {
            array_push($arrData, $r->id);
        }

        // dd($arrData);

        $before = $this->getFiveNumbersBefore($article->id);
        $after = $this->getFiveNumbersAfter($article->id);

        // dd($before);

        $countBefore = $this->compareNumb($before, $arrData);
        $countAfter = $this->compareNumb($after, $arrData);

        return $this->loadTheme('pregnancy.detail', compact('title', 'article', 'articles', 'breadcrumbs_data', 'contents', 'allRecords', 'countBefore', 'countAfter', 'before', 'after', 'pregData'));
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

    function compareNumb($arrayN, $arrData)
    {
        // compare
        $diff_key = array_diff($arrayN, $arrData);

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
        for ($i = 1; $i <= 5; $i++) {
            $result[] = $certainNumber + $i;
        }
        // Reverse the array if you want them in ascending order (e.g., 95, 96, 97, 98, 99)
        // If you want 99, 98, 97, 96, 95 leave it as is.
        return $result;
    }
}
