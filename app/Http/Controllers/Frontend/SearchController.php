<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Babyname;
use App\Models\Article;
use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function __invoke(Request $request): JsonResponse
    {
        $activities = Activity::search($request->input('query'))
            ->take(10)
            ->get();

        $articles = Article::search($request->input('query'))
            ->take(10)
            ->get();

        $babynames = Babyname::search($request->input('query'))
            ->take(10)
            ->get();
               
        return response()->json([
            'activities' => $activities,
            'articles' => $articles,
            'babynames' => $babynames,
        ]);
    }

    // public function index(Request $request)
    // {
    //     $search = $request->keyword;
    //     if ($request->keyword != '') {
    //         $results = Babyname::select(['id', 'name', 'slug'])->where('name', 'like', '%'. $search .'%')->get();
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

    public function searchTwo(Request $request)
    {
        $query = $request->input('query');
        $results = [];

        if ($query) {
            // Example: Search for users by name or slug
            $results = Babyname::where('name', 'like', '%' . $query . '%')
                           ->limit(10) // Limit results for better performance
                           ->get(['id', 'name', 'slug']); // Select specific columns
        }

        return response()->json($results);
    }

    public function searchName(Request $request)
    {
        $babynames = Babyname::search($request->input('query'))
            ->take(10)
            ->get();
               
        return response()->json([
            'babynames' => $babynames,
        ]);
    }
}
