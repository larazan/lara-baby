<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Activity extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    //
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'body',
        'locale',
        'slug',
        'rand_id',
        'status',
        'meta_description',
        'original',
    ];

    protected $dates = ['deleted_at'];

    public const UPLOAD_DIR = 'uploads/activities';

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';
    public const POST = 'Post';

    public const STATUSES = [
        self::ACTIVE => 'active',
        self::INACTIVE => 'inactive',
    ];

    public static function statuses()
	{
		return self::STATUSES;
	}

    // public function id(): int
    // {
    //     return $this->id;
    // }

    // public function title(): string
    // {
    //     return $this->title;
    // }

    // public function body(): string
    // {
    //     return $this->body;
    // }

    public function excerpt(int $limit = 200): string
    {
        return Str::limit(strip_tags($this->body), $limit);
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }

    public function readTime()
    {
        $minutes = round(str_word_count($this->body) / 200);

        return $minutes == 0 ? 1 : $minutes;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category($categoryId)
	{
		$category = Category::where('id', $categoryId)->first();
		return $category->name;
	}

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }


    // public function category()
    // {
    //     return $this->belongsToMany(Category::class, 'categories',);
    // }

    public function steps()
    {
        return $this->hasMany(Step::class)->orderBy('order_number');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function toSearchableArray(): array
    {
        return [
            // 'id' => $this->id,
            'title' => $this->title,
            // 'slug' => $this->slug,
            'body' => $this->body,
        ];
    }
}
