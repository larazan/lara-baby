<?php

namespace App\Models;

use App\Concerns\HasAuthor;
use App\Concerns\HasLikes;
use App\Concerns\HasSlug;
use App\Concerns\HasTags;
use App\Concerns\HasTimestamps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use HasAuthor;
    use HasSlug;
    use HasLikes;
    use HasTimestamps;
    use HasTags;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'body',
        'locale',
        'slug',
        'rand_id',
        'hero_image',
        'is_pinned',
        'tweet_id',
        'published_at',
        'published',
        'shared_at',
        'status',
        'original_url',
        'article_tags',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'original',
        'small',
        'medium',
        'view_count',
    ];

    protected $dates = ['deleted_at'];
    
    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'shared_at' => 'datetime',
    ];

    /**
     * {@inheritdoc}
     */
    protected $with = [
        'authorRelation',
        // 'likesRelation',
        // 'tagsRelation',
    ];

    public const UPLOAD_DIR = 'uploads/articles';

    public const SMALL = '135x141';
	public const MEDIUM = '312x400';
	public const LARGE = '1000x600';

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

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 200): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function published()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d M Y');
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
            // ->where('article_type', self::POST)
            // ->where('published_at', '<=', Carbon::now());
    }

    public function hasHeroImage(): bool
    {
        return $this->hero_image !== null;
    }

    public function heroImage($width = 400, $height = 300): string
    {
        if ($this->hero_image) {
            return "https://source.unsplash.com/{$this->hero_image}/{$width}x{$height}";
        }

        return asset('images/default-background.svg');
    }

    public function originalUrl(): ?string
    {
        return $this->original_url;
    }

    public function canonicalUrl(): string
    {
        return $this->originalUrl() ?: route('articles.show', $this->slug);
    }


    public function isPinned(): bool
    {
        return (bool) $this->is_pinned;
    }

    public function isNotShared(): bool
    {
        return $this->shared_at === null;
    }

    public function isShared(): bool
    {
        return ! $this->isNotShared();
    }

    public function readTime()
    {
        $minutes = round(str_word_count($this->body()) / 200);

        return $minutes == 0 ? 1 : $minutes;
    }

    public function viewCount()
    {
        return number_format($this->view_count);
    }

    public function isUpdated(): bool
    {
        return $this->updated_at->gt($this->created_at);
    }

    public function scopePinned(Builder $query): Builder
    {
        return $query->where('is_pinned', true);
    }

    public function scopeNotPinned(Builder $query): Builder
    {
        return $query->where('is_pinned', false);
    }

    public function scopeShared(Builder $query): Builder
    {
        return $query->whereNotNull('shared_at');
    }

    public function scopeNotShared(Builder $query): Builder
    {
        return $query->whereNull('shared_at');
    }

    public function scopeForTag(Builder $query, string $tag): Builder
    {
        return $query->whereHas('tagsRelation', function ($query) use ($tag) {
            $query->where('tags.slug', $tag);
        });
    }

    public function scopeTrending(Builder $query): Builder
    {
        return $query->withCount(['likesRelation' => function ($query) {
            $query->where('created_at', '>=', now()->subWeek());
        }])
            ->orderBy('likes_relation_count', 'desc');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id(),
            'title' => $this->title(),
            'body' => $this->body(),
            'slug' => $this->slug(),
        ];
    }

    public function splitBody($value)
    {
        return $this->split($value);
    }

    public function markAsShared()
    {
        $this->update([
            'shared_at' => now(),
        ]);
    }

    public static function nextForSharing(): ?self
    {
        return self::notShared()
            ->published()
            ->orderBy('submitted_at', 'asc')
            ->first();
    }

    // /////////

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category($categoryId)
	{
		$category = CategoryArticle::where('id', $categoryId)->first();
		return $category->name;
	}

    public function categorySlug($categoryId)
	{
		$category = CategoryArticle::where('id', $categoryId)->first();
		return $category->slug;
	}

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
}