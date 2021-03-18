<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookBorrow extends Eloquent
{
  use HasFactory;
  protected $connection = 'mongodb';
  protected $collection = 'book_borrows';
  protected $fillable = [
    'book', 'email', 'status', 'borrow_time', 'completed_time'
  ];

  public $timestamps = false;
  // const CREATED_AT = 'time';
  // protected $updated_at = false;
  // const UPDATED_AT = null;
  // protected $dateFormat = 'U';

  // public function books() {
	// 	return $this->belongsTo(Book::class);
	// }

    // public function users() {
	// 	return $this->belongsTo(User::class);
	// }
}
