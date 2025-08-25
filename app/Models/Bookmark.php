<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'bookmarkable_id',   // Add these if you manually fill them
        'bookmarkable_type', // Add these if you manually fill them
    ];
    //
    public function bookmarkable()
    {
        return $this->morphTo();
    }
}
