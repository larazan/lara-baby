<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Material;
use App\Models\Step;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ActivityController extends Controller
{
    //
    public function index(Request $request, $slug = '')
    {
        $parent_cat = Category::selectRaw('id, name, slug, parent_id, status')
                        ->whereNull('parent_id')
                        ->get()->toArray();

        // $categories = Category::selectRaw('id, name, slug, parent_id, status')
        //                 ->whereNotNull('parent_id')
        //                 ->where('status', 'active')
        //                 // ->groupBy('parent_id')
        //                 ->orderBy('parent_id', 'asc')
        //                 ->get();
        $categories = DB::table('categories AS c1')
        ->leftJoin('categories AS c2', 'c1.parent_id', '=', 'c2.id')
        ->orderBy('c2.name')
        ->orderByRaw('c1.parent_id IS NULL')
        ->orderBy('c1.parent_id')
        ->orderBy('c1.name')
        ->select('c1.name AS child_name', 'c2.name AS parent_name')
        ->get();

        // Activities
        $activityOption = Category::select(['id', 'name', 'slug', 'parent_id'])->where('parent_id', 1)->get();
        // Age
        $ages = Category::select(['id', 'name', 'slug', 'parent_id'])->where('parent_id', 3)->get();
        // Crafts
        $crafts = Category::select(['id', 'name', 'slug', 'parent_id'])->where('parent_id', 2)->get();
        // Learning
        $learnings = Category::select(['id', 'name', 'slug', 'parent_id'])->where('parent_id', 4)->get();
        // Painting
        $painting = Category::select(['id', 'name', 'slug', 'parent_id'])->where('parent_id', 5)->get();
        // Sensory
        $sensory = Category::select(['id', 'name', 'slug', 'parent_id'])->where('parent_id', 6)->get();

        $query = Activity::select([
            'category_id',
            'author_id',
            'title',
            'body',
            'locale',
            'slug',
            'status',
            'original',
            ])->active();

        if ($slug) {
            $category = Category::where('slug', $slug)->first();
            $cat_id = $category->id;
            $title = Str::ucfirst($category->name) . " Activity"; 
        } else {
            $category = null; 
            $cat_id = null; 
            $title = "Activity"; 
        }

        $query->when($cat_id > 0, function ($q) use ($cat_id) {
            return $q->where('category_id', $cat_id);
        });

        $activities = $query->paginate(12)->withQueryString();

        return $this->loadTheme('activity.index', compact('title', 'parent_cat', 'category', 'categories', 'activities', 'activityOption', 'ages', 'crafts', 'learnings', 'painting', 'sensory'));
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

        $activity = Activity::select(
            [
            'id', 
            'category_id',
            'author_id',
            'title',
            'body',
            'locale',
            'slug',
            'rand_id',
            'status',
            'meta_description',
            'original',
            'created_at', 
            'updated_at'
            ]
            )->active()->where('slug', $slug)->first();

		if (!$activity) {
			return redirect('activities');
		}

        $materials = Material::select(
            [
                'id',
                'activity_id',
                'name',
                'qty',
            ]
            )->where('activity_id', $activity->id)->get();
        
        $steps = Step::select(
            [
                'id',
                'activity_id',
                'order_number',
                'title',
                'description',
                'image_path', 
            ]
            )->where('activity_id', $activity->id)->get();

        $limit = 5;
        $activities = Activity::select(
            [
            'id', 
            'category_id',
            'author_id',
            'title',
            'body',
            'locale',
            'slug',
            'rand_id',
            'status',
            'meta_description',
            'original',
            'created_at', 
            'updated_at'
            ])->active()->where('category_id', $activity->category_id)->where('slug', '!=', $slug)->orderBy('id', 'DESC')->latest()->take($limit)->get();

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $activity->title;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($activity->id);
		$breadcrumbs_data = $breadcrumbs_data;

		$title = $activity->title;
		$contents = $this->generateIndex($activity->body);

		return $this->loadTheme('activity.detail', compact('title', 'activity', 'materials', 'steps', 'activities', 'breadcrumbs_data', 'shareComponent', 'contents'));
    }

    public function _generate_breadcrumbs_array($id) {
		// $homepage_url = url('/');
		// $breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		$sub_cat_title = 'Activities';
		// get sub cat url
		$sub_cat_url = url('activity');
	
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
