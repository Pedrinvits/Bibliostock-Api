<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'release_year', 'author_id', 'genre_id', 'publisher_id'];
    use HasFactory;

    public static function getAllBooks()
    {
        return self::all();
    }
}
