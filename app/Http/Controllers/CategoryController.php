<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'name' => 'required|unique:categories|max:255',
        ],
        [
            'name.required' => 'This field is required',
            'name.unique' => 'This Name has already been taken ',
            'name.max' => 'The Name field may not be greater than 255 characters',
        ]
        );

        // Store
        $categories = Category::create([
            'name' => $request->name,
        ]);
        
        return redirect()->back()->with('toast_success', 'Category Created Successfully!');
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
        $categories = Category::find($id);
        return view('backend.category.edit', compact('categories'));
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
            'name' => 'required|max:255|unique:categories'.$id,
        ],
        [
            'name.required' => 'This field is required',
            'name.unique' => 'This name has already been taken ',
            'name.max' => 'The Name field may not be greater than 255 characters ',
        ]
        );

        // Update
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();

        return redirect()->back()->with('toast_success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return redirect(route('category.index'))->with('toast_success', 'Category Deleted Successfully!');
    }
}
