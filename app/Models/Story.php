<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'text', 'user_id'];  // Aggiungi user_id

    // Relazione con l'utente (autore)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');  // La relazione è basata su user_id
    }
}
