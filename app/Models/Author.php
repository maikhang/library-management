<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Author extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'authors';
    protected $fillable = [
        'name', 'biography'
    ];

    // protected $created_at = false;
    // protected $updated_at = false;
    public $timestamps = FALSE;
}
