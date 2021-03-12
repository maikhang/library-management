<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'categories';
    protected $fillable = [
        'name'
    ];

    // protected $created_at = false;
    // protected $updated_at = false;

    public $timestamps = FALSE;
}
