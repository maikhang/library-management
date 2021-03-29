<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\BookBorrow;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $categories = Category::all()->count();
        $books = Book::all()->count();
        $users = User::all()->count();
        $book_borrows = BookBorrow::all()->where('status', '=', 'Borrowing')->count();

        return view('admin.index', compact('categories', 'books', 'users', 'book_borrows'));
    }
}
