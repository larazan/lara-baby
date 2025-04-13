<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'status',
    ];

    public function parent() {
        return $this->belongsTo(CategoryArticle::class, 'parent_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_categories');
    }
}