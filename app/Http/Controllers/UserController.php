<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
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

        $user_ip = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'roles' => $request->roles,
        ]);

        $ips = $request->input('ip');
        foreach ($ips as $ip) {
            IpAddress::create([
                    'user_id' => $user_ip->id,
                    'ip' => $ip,
                        ]);
        }



        return Redirect::back()->with('success', 'Form submitted successfully.');
    }

    public function update_user(Request $request, $id)
    {
    $complaint = User::findOrFail($id);
    $complaint->update($request->all());

    $complaint->ips()->update([
        'ip' => $request->input('ip')
    ]);

    return Redirect::back()->with('success', 'user updated status successfully');
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
        return Redirect::back()->with('success', 'Deleted Data successfully.');
    }
}
