<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'plot',
        'read_count',
        'user_id',

        'slug',
        'image',
        'url',
    ];

    //relazione con l'utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
