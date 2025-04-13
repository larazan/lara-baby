<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'verification_token',
        'status',
        'is_submit',
        'submitted_at',
    ];

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';
    public const POST = 'Post';

    public const STATUSES = [
        self::ACTIVE => 'active',
        self::INACTIVE => 'inactive',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function submittedAt(): ?Carbon
    {
        return $this->submitted_at;
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }

    public function markAsSubmitted()
    {
        $this->update([
            'submitted_at' => now(),
        ]);
    }
}