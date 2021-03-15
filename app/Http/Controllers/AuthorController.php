<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('backend.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.author.create');
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
            'name' => 'required|unique:authors',
        ],
        [
            'name.required' => 'This field is required',
            'name.unique' => 'This name has already been taken',
        ]
        );

        // Store
        $authors = Author::create([
            'name' => $request->name,
            'biography' => $request->biography,
        ]);

        return redirect()->back()->with('toast_success', 'Author Created Successfully!');
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
        $authors = Author::find($id);
        return view('backend.author.edit', compact('authors'));
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
            'name' => 'required|unique:authors',
        ],
        [
            'name.required' => 'This field is required',
            'name.unique' => 'This name has already been taken',
        ]
        );

        // Update
        $authors = Author::find($id);
        $authors->name = $request->name;
        $authors->biography = $request->biography;
        $authors->save();

        return redirect()->back()->with('toast_success', 'Author Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Author::find($id);
        $authors->delete();

        return redirect(route('author.index'))->with('toast_success', 'Author Deleted Successfully!');
    }
}
