<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
    protected $fillable = ['title', 'text', 'user_id'];

    //relazione con User
    public function user(): BelongsTo
    {   /* definisco la relazione one to one tra Story e User */
        return $this->belongsTo(User::class);
    }

    //relazione con Category
    public function category(): BelongsTo
    {   /* definisco la relazione one to one tra Story e Category */
        return $this->belongsTo(Category::class);
    }
}
