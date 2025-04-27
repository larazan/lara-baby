<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const TABLE = 'categories';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'status',
    ];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'categories');
    }
}