<?php

namespace App\Models;

use App\Contracts\ImageRelationshipsContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model implements ImageRelationshipsContract
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'time', 'is_relevant'];

    /**
     * @var array
     */
    protected $casts = [
        'time' => 'date:d.m.Y',
        'created_at' => 'datetime:d.m.Y H:i',
        'is_relevant' => 'boolean'
    ];

    /**
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    /**
     * @return HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
