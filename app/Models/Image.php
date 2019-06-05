<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['path'];

    /**
     * @var array
     */
    protected $hidden = ['pivot'];

    /**
     * @return string
     */
    public function getPathAttribute(): string
    {
        return config('app.url') . '/storage/' . $this->attributes['path'];
    }

    /**
     * @return string
     */
    public function getRealPathAttribute(): string
    {
        return $this->attributes['path'];
    }
}
