<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
    protected $fillable = ['title', 'text', 'user_id'];

    //relazione con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
