<?php

namespace App\Models;

use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /* relazione con Story */
    public function stories(): HasMany
    {   /* definisco la relazione one to many tra Category e Story */
        return $this->hasMany(Story::class);
    }
}
