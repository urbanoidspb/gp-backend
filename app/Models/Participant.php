<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    /**
     * @var array 
     */
    protected $fillable = ['first_name', 'last_name', 'patronymic', 'email', 'phone'];

    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
