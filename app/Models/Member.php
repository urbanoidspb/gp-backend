<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'phone'];
}
