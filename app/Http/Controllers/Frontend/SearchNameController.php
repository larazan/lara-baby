<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Babyname;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchNameController extends Controller
{
    //
    public function __invoke(Request $request): JsonResponse
    {
        $queryBabyname = Babyname::search($request->input('query'))->get();
        $babynames = Babyname::search($request->input('query'))
            ->take(10)
            ->get();
               
        return response()->json([
            'keyword' => $request->input('query'),
            'queryBabyname' => $queryBabyname->count(),
            'babynames' => $babynames,
        ]);
    }
}
