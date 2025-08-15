<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Instruction extends Model
{
    //
    protected $fillable = [
        'activity_id',
        'step_number',
        'title',
        'description',
        'image_path',
    ];

    /**
     * Get the activity that owns the instruction.
     */
    public function activity()
    {
        // Define a many-to-one relationship with the Receipt model
        return $this->belongsTo(Activity::class);
    }

    /**
     * The "booted" method of the model.
     * Use this to register model event listeners.
     */
    protected static function booted()
    {
        // When an Instruction is being deleted, delete its associated image.
        static::deleting(function (Instruction $instruction) {
            if ($instruction->image_path && Storage::disk('public')->exists($instruction->image_path)) {
                Storage::disk('public')->delete($instruction->image_path);
            }
        });
    }
}
