<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function books() {
		return $this->hasMany(Book::class);
	}
}
