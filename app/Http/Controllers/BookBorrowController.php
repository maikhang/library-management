<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookBorrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_borrows = BookBorrow::all();
        return view('backend.bookBorrow.index', compact('book_borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('backend.bookBorrow.create', compact('books', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate(
        [
            'book' => 'required',
            'email' => 'required',
        ],
        [
            'book.required' => 'This field is required',
            'email.required' => 'This field is required',
        ]
        );

        // Store
        $book_borrows = BookBorrow::create([
            'book' => $request->book,
            'email' => $request->email,
            'status' => 'Borrowing',
            'borrow_time' => Carbon::now()->toDateTimeString()
        ]);
    
        return redirect()->back()->with('toast_success', 'Book Borrow Created Successfully!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $bookBorrowIds = [];
        $book_borrows = BookBorrow::find($id);
        $books = Book::all();
        if(is_array($book_borrows->book)){
            foreach($book_borrows->book as $bookBorrowItem)
            {
                $bookBorrowIds[] = $bookBorrowItem;
            } 
        }

        return view('backend.bookBorrow.edit', compact('books', 'users', 'book_borrows', 'bookBorrowIds'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // Validation
        $validated = $request->validate(
            [
                'book' => 'required',
                'email' => 'required',
                'status' => 'required',
            ],
            [
                'book.required' => 'This field is required',
                'email.required' => 'This field is required',
                'status.required' => 'This field is required',
            ]
        );
    
        // Update
        $book_borrows = BookBorrow::find($id);
        $book_borrows->book = $request->book;
        $book_borrows->email = $request->email;
        $book_borrows->status = $request->status;
        if($book_borrows->status == 'Completed') {
            $book_borrows->completed_time = Carbon::now()->toDateTimeString();
        }
        else {
            $book_borrows->completed_time = null;
        }

        $book_borrows->save();

        return redirect()->back()->with('toast_success', 'Book Borrow Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_borrows = BookBorrow::find($id);
        $book_borrows->delete();

        return redirect(route('bookBorrow.index'))->with('toast_success', 'Book Borrow Deleted Successfully!');
    }
}