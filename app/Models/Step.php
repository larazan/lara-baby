<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    
    //
    protected $fillable = [
        'activity_id',
        'order_number',
        'title',
        'description',
        'image_path',
    ];

    public const UPLOAD_DIR = 'uploads/steps';

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}
