<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'phone' => 'required|numeric',
        ],
        [
            'name.required' => 'This field is required',
            'name.max' => 'The Name field may not be greater than 255 characters',
            'email.required' => 'This field is required',
            'email.email' => 'This field much be a valid email address',
            'email.unique' => 'This email has already been taken',
            'address.required' => 'This field is required',
            'phone.required' => 'This field is required',
            'phone.numeric' => 'This field must a be number',
        ]
        );

        // Store
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('toast_success', 'User Created Successfully!');
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
        $users = User::find($id);
        return view('backend.user.edit', compact('users'));
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
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users'.$id,
                'address' => 'required',
                'phone' => 'required|numeric',
            ],
            [
                'name.required' => 'This field is required',
                'name.max' => 'The Name field may not be greater than 255 characters',
                'email.required' => 'This field is required',
                'email.email' => 'This field much be a valid email address',
                'email.unique' => 'This email has already been taken',
                'address.required' => 'This field is required',
                'phone.required' => 'This field is required',
                'phone.numeric' => 'This field must a be number'
            ]
        );

        // Update
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->save();

        return redirect()->back()->with('toast_success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect(route('user.index'))->with('toast_success', 'User Deleted Successfully!');
    }
}