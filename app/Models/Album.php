<?php

namespace App\Models;

use App\Contracts\ImageRelationshipsContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model implements ImageRelationshipsContract
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'time'];

    /**
     * @var array
     */
    protected $casts = [
        'time' => 'date:d.m.Y',
        'created_at' => 'datetime:d.m.Y H:i'
    ];

    /**
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }
}
