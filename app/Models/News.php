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
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }
}
