<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'segment_id',
        'title',
        'start',
        'end',
        'url',
        'original',
        'small',
        'status',
    ];

    public const UPLOAD_DIR = 'uploads/advertisings';
    public const SMALL = '135x75';

    public function segments()
	{
		return $this->belongsToMany(AdvertisingSegment::class);
	}
}
