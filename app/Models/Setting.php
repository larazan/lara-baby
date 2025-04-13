<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

    public const UPLOAD_DIR = 'uploads/setting';
    public const UPLOAD_DIR_ICON = 'uploads/icon';

    public const MEDIUM = '312x400';
	public const SMALL = '135x75';
}