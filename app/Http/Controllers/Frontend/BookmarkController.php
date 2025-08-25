<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    //
    // BookmarkController.php

public function toggle(Request $request)
{
    $request->validate([
        'bookmarkable_type' => 'required|string',
        'bookmarkable_id' => 'required|integer',
    ]);

    $modelClass = "App\\Models\\" . $request->bookmarkable_type;
    $bookmarkable = $modelClass::findOrFail($request->bookmarkable_id);

    $user = auth()->user();

    if ($user->hasBookmarked($bookmarkable)) {
        // Unbookmark it
        $user->bookmarks()->where('bookmarkable_id', $bookmarkable->id)
                         ->where('bookmarkable_type', get_class($bookmarkable))
                         ->delete();
        return response()->json(['status' => 'removed', 'message' => 'Bookmark removed.']);
    } else {
        // Bookmark it
        $user->bookmarks()->create([
            'bookmarkable_id' => $bookmarkable->id,
            'bookmarkable_type' => get_class($bookmarkable),
        ]);
        return response()->json(['status' => 'added', 'message' => 'Bookmark added.']);
    }
}
}
