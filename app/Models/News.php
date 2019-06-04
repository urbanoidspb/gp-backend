<?php

namespace App\Models;

use App\Contracts\ImageRelationshipsContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model implements ImageRelationshipsContract
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'text'];

    /**
     * @var array
     */
    protected $casts = [
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
