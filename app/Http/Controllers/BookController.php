<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        // $author = Author::all();
        // $categories = Category::all();
        return view('backend.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('backend.book.create', compact('categories', 'authors'));
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
            'name' => 'required|unique:books',
            'category' => 'required',
            'author' => 'required',
            'status' => 'required',
        ],
        [
            'name.required' => 'This field is required',
            'name.unique' => 'This name has already been taken',
            'category.required' => 'This field is required',
            'author.required' => 'This field is required',
            'name.required' => 'This field is required',
        ]
        );

        // Store
        $books = Book::create([
            'name' => $request->name,
            'category' => $request->category,
            'author' => $request->author,
            'status' => $request->status,
            'summary' => $request->summary,
        ]);
    
        return redirect()->back()->with('toast_success', 'Book Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $books = Book::find($id);
        $categories = Category::all();
        $bookIds = [];
        $books = Book::find($id);
        $authors = Author::all();
        foreach($books->author as $bookItem)
        {
            $bookIds[] = $bookItem;
        }  
        $authors = Author::all();
        return view('backend.book.edit', compact('books', 'categories', 'authors', 'bookIds'));     
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
            'name' => 'required|unique:books' . $id,
            'category' => 'required',
            'author' => 'required',
            'status' => 'required',
        ],
        [
            'name.required' => 'This field is required',
            'name.unique' => 'This name has already been taken',
            'category.required' => 'This field is required',
            'author.required' => 'This field is required',
        ]
        );
    
        // Update
        $books = Book::find($id);
        $books->name = $request->name;
        $books->category = $request->category;
        $books->author = $request->author;
        $books->status = $request->status;
        $books->summary = $request->summary;
        $books->save();

        return redirect()->back()->with('toast_success', 'Book Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::find($id);
        $books->delete();

        return redirect(route('book.index'))->with('toast_success', 'Book Deleted Successfully!');
    }
}
