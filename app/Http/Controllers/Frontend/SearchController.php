<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Babyname;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->keyword;
        if ($request->keyword != '') {
            $results = Babyname::select(['id', 'name', 'slug'])->where('name', 'like', '%'. $search .'%')->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'success',
            'keyword' => $search,
            'data'    => $results  
        ]);
    }

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
