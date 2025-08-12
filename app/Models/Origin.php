<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    //
    protected $fillable = [
        'name',
        'status',
    ];

    public function babynames()
    {
        return $this->hasMany(Babyname::class, 'origin_id');
    }
}
