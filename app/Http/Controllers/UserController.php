<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index_users()
    {
        $users = User::all();

        return view('index-user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store_users(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:8',
            'roles'=> 'required',
        ]);

        $hashedPassword = Hash::make($request->input('password'));

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'roles' => $request->roles,
        ]);

        return Redirect::back()->with('success', 'Form submitted successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function delete_users(User $users)
    {
        $users->delete();
        return Redirect::back()->with('success', 'Deleted successfully.');
    }
}