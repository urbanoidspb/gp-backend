<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'time', 'is_relevant'];

    /**
     * @var array
     */
    protected $casts = [
        'time' => 'datetime',
        'is_relevant' => 'boolean'
    ];

    /**
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }
}
