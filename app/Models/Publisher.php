<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name', 'country'];
    use HasFactory;
    
    public static function getAllPublisher()
    {
        return self::all();
    }
}
