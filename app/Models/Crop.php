<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'planting_date',
        'harvest_date',
        'description',
        'user_id',
    ];

    /**
     * Get the user that owns the crop.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
