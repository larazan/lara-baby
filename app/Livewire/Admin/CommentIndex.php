<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'desc';
    public $perPage = 10;

    public function render()
    {
        $comments = Comment::with('commentable', 'user')
            ->orderBy('created_at', $this->sort)
            ->paginate($this->perPage); // Use pagination for large datasets

        return view('livewire.admin.comment-index', [
            'comments' => $comments,
        ]);
    }
}
