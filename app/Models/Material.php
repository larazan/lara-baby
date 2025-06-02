<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name', 'qty'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
