<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Story extends Model
{
    protected $fillable = ['title', 'text', 'user_id', 'category_id'];

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

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
