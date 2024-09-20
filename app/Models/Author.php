<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'birth_year', 'gender', 'nationality'];
    use HasFactory;
    
    public static function getAllAuthors()
    {
        return self::all();
    }
}
