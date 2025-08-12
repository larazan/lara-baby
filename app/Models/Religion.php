<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public function babynames()
    {
        return $this->hasMany(Babyname::class, 'religion_id');
    }

	public function namelists()
    {
        return $this->hasMany(Namelist::class, 'religion_id');
    }
}
