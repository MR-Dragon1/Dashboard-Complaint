<?php

namespace App\Http\Controllers;

use App\Models\Announs;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AnnounsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_announs()
    {
        $announs = Announs::select('id','email','announcement_image','title','description','created_at')
                    ->orderByDesc('id')
                    ->get();

        return view('index-announ', compact('announs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store_announs(Request $request)
    {
            $request->validate([
                'email'=> 'required',
                'title'=> 'required',
                'description'=> 'required',
            ]);

            $image = $request->file('image');

            if (
            $request->hasFile('image')) {
                    $nama_file = $image->getClientOriginalName();
                    $nama_game = pathinfo($nama_file, PATHINFO_FILENAME);
                    $dir = "Dashboard-Complaint\'2023'\Announcements";
                    $path = \Storage::disk('do_spaces')->putFileAs($dir, $image, $nama_game . '.' . $image->getClientOriginalExtension(), 'public');
                    $image_url = "https://smbstatic.sgp1.digitaloceanspaces.com/$path";
                    Announs::create([
                        'email' => $request->email,
                        'title' => $request->title,
                        'description' => $request->description,
                        'announcement_image' => $image_url,
                    ]);
            } else {
                $i = null;
                Announs::create([
                        'email' => $request->email,
                        'title' => $request->title,
                        'description' => $request->description,
                        'announcement_image' => $i,

                ]);
            }




            return Redirect::back()->with('success', 'Form submitted successfully');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function delete_announs(Announs $announs)
    {
        $announs->delete();
        return Redirect::back()->with('success', 'Deleted successfully.');
    }
}