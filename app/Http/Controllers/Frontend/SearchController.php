<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Activity;
use App\Models\Category;
use App\Models\CategoryArticle;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    // public function index(Request $request)
    // {
    //     $search = $request->keyword;
    //     if ($request->keyword != '') {
    //         $results = Fact::select(['uuid', 'title', 'slug'])->where('title', 'like', '%'. $search .'%')->get();
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'success',
    //         'keyword' => $search,
    //         'data'    => $results  
    //     ]);
    // }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        // $keyword = $request->input('keyword');
        
        if (!$keyword) {
			return redirect('/');
		}

        $articles = DB::table('articles')
            ->select(
                'id', 'title', 'description', 'slug', DB::raw('"article" as type')
            )
            ->where('title', 'LIKE', "%$keyword%")
            ->get();

        $activities = DB::table('activities')
            ->select(
                'id', 'title', 'description', 'slug', DB::raw('"activity" as type')
            )
            ->where('title', 'LIKE', "%$keyword%")
            ->get();

        // Combine the results
        $results = $articles->merge($activities);

        $title = "Search";

        return $this->loadTheme('search.index', compact('title', 'keyword', 'results'));
    }
}
