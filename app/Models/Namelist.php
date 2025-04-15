<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namelist extends Model
{
    use HasFactory;

    protected $table = 'namelist';

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    public const STATUSES = [
        self::ACTIVE => 'active',
        self::INACTIVE => 'inactive',
    ];

    protected $fillable = [
        'full_name', 
        'native_name', 
        'meaning',
        'gender_id',
        'country_id',
        'religion_id',
        'status',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('full_name', 'like', "%{$value}%");
    }

    public function id(): int
    {
        return $this->id;
    }
    
    public function full_name(): string
    {
        return $this->full_name;
    }

    public function meaning(): string
    {
        return $this->meaning;
    }

    public function native(): string
    {
        return $this->native_name;
    }
}
