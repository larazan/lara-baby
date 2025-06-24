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
        'views',
        'clicks',
        'description',
    ];

    public const UPLOAD_DIR = 'uploads/advertisings';
    public const SMALL = '135x75';

    // Scopes for easy querying
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                     ->where(function ($q) {
                         $q->whereNull('start')
                           ->orWhere('start', '<=', now());
                     })
                     ->where(function ($q) {
                         $q->whereNull('end')
                           ->orWhere('end', '>=', now());
                     });
    }

   public function segment($segmentId)
   {
       $s = AdvertisingSegment::where('id', $segmentId)->first();
       return $s->title;
   }
   
    public function segments()
	{
		return $this->belongsToMany(AdvertisingSegment::class);
	}
}
