<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = ['name', 'code'];

    public function babynames()
    {
        return $this->hasMany(Babyname::class, 'country_id');
    }

    public function namelists()
    {
        return $this->hasMany(Namelist::class, 'country_id');
    }
}