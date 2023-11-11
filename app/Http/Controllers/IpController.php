<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IpController extends Controller
{
    public function index_ip() {

        $ips = IpAddress::all();
        return view('index-ip', compact('ips'));
    }


    public function store_ip(Request $request)
    {
        $request->validate([
            'ip'=> 'required',
        ]);

        IpAddress::create([
            'ip' => $request->ip,
        ]);

        return Redirect::back()->with('success', 'Form submitted successfully');
    }

    public function delete_ip(IpAddress $ips)
    {
        $ips->delete();
        return Redirect::back()->with('success', 'Deleted successfully.');
    }

}