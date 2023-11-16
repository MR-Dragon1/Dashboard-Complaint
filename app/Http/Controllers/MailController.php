<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Mails;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index_informatic()
    {
        $complaints = Mails::select('id','email','site','complaints','complaints_image','status','page','created_at', 'updated_at')->where('page', '1')->get();


        return view('index-informatic', compact('complaints'));
    }
    public function index_mail()
    {
        $complaints = Mails::all();


        return view('index-mail', compact('complaints'));
    }
    public function update_complaint(Request $request, $id)
{
    $complaint = Mails::findOrFail($id);
    $complaint->update($request->all());

    $user = Auth::user()->email;
    $complaint->comments()->create([
        'message' => $request->input('message'),
        'person' => $user,
        'roles' => $request->input('roles'),
        'mails_id' => $request->$user,
    ]);

    return Redirect::back()->with('success', 'Complaint updated status successfully');
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
                'expectation' => 'required',
                'ticket' => 'required',
                'g-recaptcha-response' => 'required|captcha'
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
                        'expectation' => $request->expectation,
                        'email' => $request->email,
                        'site' => $request->site,
                        'ticket' => $request->ticket,
                        'complaints_image' => $image_url,
                    ]);
            } else {

                $i = null;

                $complaint = Mails::create([
                        'complaints' => $request->complaint,
                        'expectation' => $request->expectation,
                        'email' => $request->email,
                        'site' => $request->site,
                        'ticket' => $request->ticket,
                        'complaints_image' => $i
                ]);
            }
            Session::flash('additionalData', compact('complaint'));

            return Redirect::back()->with('success', 'Form submitted successfully');

    }
}