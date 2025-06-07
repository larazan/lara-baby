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
        'description',
        'parent_id',
        'status',
    ];

    public function slug(): string
    {
        return $this->slug;
    }

    public function parent() {
        return $this->belongsTo(CategoryArticle::class, 'parent_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}