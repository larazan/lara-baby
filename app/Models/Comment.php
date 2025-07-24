<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'guest_name',
        'guest_email',
        'commentable_id',   // Add these if you manually fill them
        'commentable_type', // Add these if you manually fill them
    ];

    /**
     * Get the parent commentable model (post, video, etc.).
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the comment (if logged in).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
