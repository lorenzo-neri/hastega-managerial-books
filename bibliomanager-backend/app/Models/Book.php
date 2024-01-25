<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'plot',
        'read_count',
        'user_id'
    ];

    //relazione con l'utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
