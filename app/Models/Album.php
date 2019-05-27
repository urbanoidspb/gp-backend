<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'time'];

    /**
     * @var array
     */
    protected $casts = [
        'time' => 'datetime'
    ];

    /**
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }
}
