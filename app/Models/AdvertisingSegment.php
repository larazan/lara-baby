<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingSegment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'size',
        'original',
        'status',
    ];

    public const UPLOAD_DIR = 'uploads/advsegments';

	public function advertisings()
    {
        return $this->belongsToMany(Advertising::class, 'segment_id');
    }
}
