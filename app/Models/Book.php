<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'books';
    protected $fillable = [
      'name', 'category','author', 'status', 'summary'
    ];

    public $timestamps = FALSE;

    public function categories() {
		return $this->belongsTo(Category::class);
	}

    public function authors() {
		return $this->belongsTo(Author::class);
	}
}