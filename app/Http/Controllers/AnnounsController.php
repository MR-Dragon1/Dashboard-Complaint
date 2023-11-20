<?php

namespace App\Http\Controllers;

use App\Models\AnnounImage;
use App\Models\Announs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AnnounsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_announs()
    {
        $announs = Announs::select('id','email','title','description','created_at')
                    ->orderByDesc('id')
                    ->get();
        return view('index-announ', compact('announs'));
    }
    public function index_message()
    {
        $messages = Announs::all();

        return view('index-message', compact('messages'));
    }


    public function update_message(Request $request, $id)
{
    $announs = Announs::findOrFail($id);
    $announs->update($request->all());

    $user = Auth::user()->email;
    $announs->updatesAnnouns()->create([
        'status' => $request->input('status'),
        'message' => $request->input('message'),
        'announs_id' => $request->$user,
    ]);

    return Redirect::back()->with('success', 'Updated status message successfully');
}





    public function store_announs(Request $request)
    {
            $request->validate([
                'title'=> 'required',
                'description'=> 'required',
            ]);
            $user = Auth::user()->email;

            $complaint = Announs::create([
                        'email' => $user,
                        'title' => $request->title,
                        'description' => $request->description,
                    ]);


            $images = $request->file('image');
            if ($request->hasFile('image')) {
                foreach ($images as $image) {

                    $nama_file = $image->getClientOriginalName();
                    $nama_game = pathinfo($nama_file, PATHINFO_FILENAME);
                    $dir = "Dashboard-Complaint\'2023'\Announcements";
                    $path = \Storage::disk('do_spaces')->putFileAs($dir, $image, $nama_game . '.' . $image->getClientOriginalExtension(), 'public');
                    $image_url = "https://smbstatic.sgp1.digitaloceanspaces.com/$path";

                    AnnounImage::create([
                    'announs_id' => $complaint->id,
                    'image' => $image_url,
                        ]);
                    }
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