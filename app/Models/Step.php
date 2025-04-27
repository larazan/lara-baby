<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    //
    protected $fillable = [
        'activity_id',
        'order_number',
        'title',
        'description',
        'image_path',
    ];

    public const UPLOAD_DIR = 'uploads/steps';

    public function recipe()
    {
        return $this->belongsTo(Activity::class);
    }

}
