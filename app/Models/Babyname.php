<?php

namespace App\Models;

use App\Concerns\HasAuthor;
use App\Concerns\HasLikes;
use App\Concerns\HasSlug;
use App\Concerns\HasUniqueSlug;
use App\Concerns\HasTags;
use App\Concerns\HasTimestamps;
use App\Concerns\SlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;

class Babyname extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use HasAuthor;
    use HasSlug;
    // use HasLikes;
    use HasTimestamps;
    // use HasTags;
    // use HasUuids;
    use SlugTrait;
    use Searchable;

    const TABLE = 'babynames';

    protected $table = self::TABLE;

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    public const STATUSES = [
        self::ACTIVE => 'active',
        self::INACTIVE => 'inactive',
    ];

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'pronounce',
        'native_name',
        'meaning',
        // 'variations',
        'gender_id',
        'country_id',
        'religion_id',
        'origin_id',
        'locale',
        'status',
	];

    protected $hidden = [
        'id'
    ];

    // protected $guarded = [];

    // public const UPLOAD_DIR = 'uploads/facts';

    // public const SMALL = '135x141';
	// public const MEDIUM = '312x400';

    // public static function boot() {
    //     parent::boot();
    //     // Auto generate UUID when creating data 
    //     static::creating(function ($model) {
    //         if (empty($model->{$model->getKeyName()})) {
    //             $model->{$model->getKeyName()} = Str::uuid()->toString();
    //         }
    //     });
    // }

     /**
     * Kita override getIncrementing method
     *
     * Menonaktifkan auto increment
     */
    // public function getIncrementing()
    // {
    //     return false;
    // }

    /**
     * Kita override getKeyType method
     *
     * Memberi tahu laravel bahwa model ini menggunakan primary key bertipe string
     */
    // public function getKeyType()
    // {
    //     return 'string';
    // }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    // public function id(): int
    // {
    //     return $this->id;
    // }
    
    // public function name(): string
    // {
    //     return $this->name;
    // }

    // public function slug(): string
    // {
    //     return $this->slug;
    // }

    public function slugysh(): string
    {
        return Str::slug($this->name);
    }

    public function pronounce(): string
    {
        return $this->pronounce;
    }

    public function meaning(): string
    {
        return $this->meaning;
    }

    public function native(): string
    {
        return $this->native_name;
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }

    public function count(): string
    {
        return strlen($this->name);
    }
    
    public function religion($religionId)
    {
        $rel = Religion::where('id', $religionId)->first();
		return $rel->name;
    }

    public function country($countryId)
	{
		$country = Country::where('id', $countryId)->first();
		return $country->name;
	}

    public function origin($originId)
    {
        $origin = Origin::where('id', $originId)->first();
		return $origin->name;
    }
    
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}

// php artisan scout:import "App\Models\Activity"
// php artisan scout:import "App\Models\Article"
// php artisan scout:import "App\Models\Babyname"