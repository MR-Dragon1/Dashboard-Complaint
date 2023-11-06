<?php

namespace App\Http\Controllers;

use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_sites()
    {
        $sites = Sites::all();

        return view('index-site', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store_sites(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'grup'=> 'required'
        ]);

        Sites::create([
            'name_sites' => $request->name,
            'groups' => $request->grup
        ]);

        return Redirect::back()->with('success', 'Form submitted successfully');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function delete_sites(Sites $sites)
    {
        $sites->delete();
        return Redirect::back()->with('success', 'Deleted successfully.');
    }
}