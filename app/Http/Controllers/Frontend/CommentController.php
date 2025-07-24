<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Define a map for your commentable types to their models
    protected $commentableTypes = [
        'articles' => \App\Models\Article::class,
        'activities' => \App\Models\Activity::class,
        // Add other commentable models here
    ];

    // Helper to resolve the commentable model
    protected function resolveCommentable(string $type, int $id)
    {
        if (!isset($this->commentableTypes[$type])) {
            abort(404, 'Commentable type not found.');
        }

        $modelClass = $this->commentableTypes[$type];

        try {
            return $modelClass::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Commentable item not found.');
        }
    }

    public function index(string $commentableType, int $commentableId)
    {
        $commentable = $this->resolveCommentable($commentableType, $commentableId);

        return response()->json(
            $commentable->comments()
                ->with('user') // Eager load user for registered comments
                ->latest()
                ->get()
                ->map(function ($comment) {
                    // Prepare the comment data to include guest info if user_id is null
                    return [
                        'id' => $comment->id,
                        'content' => $comment->content,
                        'created_at' => $comment->created_at,
                        'user' => $comment->user ? ['name' => $comment->user->name] : null, // Only user data if user exists
                        'guest_name' => $comment->guest_name,
                        'guest_email' => $comment->guest_email,
                        // Add other fields as needed
                    ];
                })
        );
    }

    public function store(Request $request, string $commentableType, int $commentableId)
    {
        $commentable = $this->resolveCommentable($commentableType, $commentableId);

        $validationRules = [
            'content' => 'required|string|max:1000',
        ];

        if (!Auth::check()) {
            // If guest, require name and email
            $validationRules['guest_name'] = 'required|string|max:255';
            $validationRules['guest_email'] = 'required|email|max:255';
        }

        $request->validate($validationRules);

        $commentData = [
            'content' => $request->input('content'),
        ];

        if (Auth::check()) {
            $commentData['user_id'] = Auth::id();
        } else {
            $commentData['guest_name'] = $request->input('guest_name');
            $commentData['guest_email'] = $request->input('guest_email');
        }

        // Use the commentable relationship to create the comment
        $comment = $commentable->comments()->create($commentData);

        // Load the user relationship for display if it's a registered user
        if ($comment->user_id) {
            $comment->load('user');
        }

        // Return the necessary data for the frontend
        return response()->json([
            'id' => $comment->id,
            'content' => $comment->content,
            'created_at' => $comment->created_at,
            'user' => $comment->user ? ['name' => $comment->user->name] : null,
            'guest_name' => $comment->guest_name,
            'guest_email' => $comment->guest_email,
        ], 201);
    }
}
