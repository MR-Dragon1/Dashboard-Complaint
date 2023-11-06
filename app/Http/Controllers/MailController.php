<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Informatic;
use App\Models\Mails;
use App\Models\Sites;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index_mail()
    {
        $sites = Sites::all();
        $complaints = Mails::all();


        return view('index-mail', compact('complaints', 'sites'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store_complaint(Request $request)
    {
            $request->validate([
                'complaint' => 'required',
                'email' => 'required',
                'site' => 'required',
            ]);

            $image = $request->file('image');

            if ($request->hasFile('image')) {
                    $nama_file = $image->getClientOriginalName();
                    $nama_game = pathinfo($nama_file, PATHINFO_FILENAME);
                    $dir = "Dashboard-Complaint\'2023'\Complaints";
                    $path = \Storage::disk('do_spaces')->putFileAs($dir, $image, $nama_game . '.' . $image->getClientOriginalExtension(), 'public');
                    $image_url = "https://smbstatic.sgp1.digitaloceanspaces.com/$path";
                    Mails::create([
                        'complaints' => $request->complaint,
                        'email' => $request->email,
                        'site' => $request->site,
                        'complaints_image' => $image_url,
                    ]);
            } else {

                $i = null;

                Mails::create([
                        'complaints' => $request->complaint,
                        'email' => $request->email,
                        'site' => $request->site,
                        'complaints_image' => $i
                ]);
            }



            return redirect()->route('index-mail')->with('success', 'Form submitted successfully');

    }

    /**
     * Display the specified resource.
     */

    public function show_complaint(Mails $complaint)
    {
        $data = $complaint->with('comments')->get()->find($complaint);




        $comments = json_decode($data, true);
        $jumlahObject = count($comments['comments']);



        return view('show_complaint', compact('complaint', 'data', 'jumlahObject'));
    }

    public function store_comment(Request $request, Mails $complaint)
    {

    if (!Auth::check()) {
        $data = $request->validate([
        'message' => 'required|string',
        'roles' => 'required|string',
        'person' => 'required|string',]);
    } else {
        $data = $request->validate([
        'message' => 'required|string',
        'roles' => 'required|string',]);

        $user = Auth::user()->email;
    }

    $comment = new Comments();
    $comment->message = $data['message'];
    if(!Auth::check()){
        $comment->person =$data['person'];;
    }   else {
        $comment->person = $user;

    }
    $comment->roles = $data['roles'];
    $comment->mails_id = $complaint->id;
    $comment->save();

    return back()->with('success', 'Comment successfully added');
    }

    public function delete_comment($id)
{
    $comment = Comments::find($id);

    if ($comment) {
        $comment->delete();

        return back()->with('success', 'Comment successfully deleted');
    }

}





    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update_complaint(Request $request)
{
    $complaintId = $request->input('complaint_id');

    $request->validate([
        'status' => 'required',
        'page' => 'required',
    ]);

    $complaint = Mails::find($complaintId);

    if ($complaint) {
        $complaint->update([
            'status' => $request->status,
            'page' => $request->page,
        ]);

        return redirect()->route('index-mail')->with('success', 'The complaint status has been changed');
    }

    return redirect()->route('index-mail')->with('error', 'Complaint not found');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}