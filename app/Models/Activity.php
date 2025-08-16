<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Storage;

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
        'materials',
        'locale',
        'slug',
        'rand_id',
        'status',
        'is_favorite',
        'meta_description',
        'original',
    ];

    // Cast the 'ingredients' attribute to an array when retrieved
    // and automatically converted to JSON when stored.
    protected $casts = [
        'materials' => 'array',
    ];

    /**
     * Get the instructions for the receipt.
     */
    public function instructions()
    {
        // Define a one-to-many relationship with the Instruction model
        // Order by step_number to maintain logical sequence
        return $this->hasMany(Instruction::class)->orderBy('step_number');
    }

    /**
     * The "booted" method of the model.
     * Use this to register model event listeners.
     */
    protected static function booted()
    {
        // When a Activity is being deleted, delete all associated instruction images.
        static::deleting(function (Activity $activity) {
            foreach ($activity->instructions as $instruction) {
                if ($instruction->image_path && Storage::disk('public')->exists($instruction->image_path)) {
                    Storage::disk('public')->delete($instruction->image_path);
                }
            }
        });
    }

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

    public function category()
	{
        return $this->belongsTo(Category::class, 'category_id');
	}

    public function steps()
    {
        return $this->hasMany(Step::class)->orderBy('order_number');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'activity_id');
    }

    public function materialLists($activityId)
    {
        $materials = Material::select(
            [
                'id',
                'activity_id',
                'name',
                'qty',
            ]
            )->where('activity_id', $activityId)->get();
        
            return $materials;
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

    /**
     * Get all of the post's comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
