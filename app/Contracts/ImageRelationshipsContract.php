<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface ImageRelationshipsContract
{
    /**
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany;
}