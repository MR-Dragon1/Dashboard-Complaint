<?php

namespace App\Http\Controllers;

use App\Models\BlockedIP;
use App\Models\Codes;
use App\Models\ComplaintImage;
use App\Models\Mails;
use App\Models\SpamEntry;
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
        $complaints = $data = Mails::select('id', 'email', 'site','name','code', 'expectation', 'ticket', 'complaints', 'status', 'page', 'created_at', 'updated_at')
                                    ->where('page', '=', '1')
                                    ->orderBy('status', 'asc')
                                    ->orderBy('id', 'desc')
                                    ->get();


        return view('index-informatic', compact('complaints'));
    }
    public function index_mail()
    {

        $complaints = Mails::orderBy('status', 'asc')->orderBy('id', 'desc')->get();

        $codes = Codes::pluck('code');

        return view('index-mail', compact('complaints', 'codes'));
    }

    public function index_spam()
    {
        $spams = SpamEntry::all();
        return view('index-spam', compact('spams'));
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

        // $ipAddress = $request->ip();
        $ipAddress = getUserIP();

        $blockedIP = BlockedIP::where('ip_address', $ipAddress)->first();

        if ($blockedIP && $blockedIP->spam_count >= 4) {
            return redirect()->back()->with('success-spam', 'Your IP has been blocked because it is considered spam');
        }

        $request->validate([
            'complaint' => 'required',
            'email' => 'required',
            'name' => 'required',
            'code' => 'required',
            'site' => 'required',
            'expectation' => 'required',
            'ticket' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $complaint = Mails::create([
            'complaints' => $request->complaint,
            'expectation' => $request->expectation,
            'email' => $request->email,
            'name' => $request->name,
            'code' => $request->code,
            'site' => $request->site,
            'ticket' => $request->ticket,
        ]);

        $images = $request->file('image');
        if ($request->hasFile('image')) {
            foreach ($images as $image) {
                $nama_file = $image->getClientOriginalName();
                $nama_game = pathinfo($nama_file, PATHINFO_FILENAME);
                $dir = "Dashboard-Complaint/2023/Complaints";
                $path = Storage::disk('do_spaces')->put($dir, $image);
                // $path = Storage::disk('do_spaces')->putFileAs($dir, $image, $nama_game . '.' . $image->getClientOriginalExtension(), 'public');
                // $image_url = "https://smbstatic.sgp1.digitaloceanspaces.com/$path";
                $image_url = Storage::disk('do_spaces')->url($path);;

                ComplaintImage::create([
                    'mails_id' => $complaint->id,
                    'image' => $image_url,
                ]);
            }
        }

        if (isSpam($request->input('complaints')) || isSpam($request->input('expectation'))) {
            if ($blockedIP) {
                $blockedIP->spam_count += 1;
                $blockedIP->save();

                if ($blockedIP->spam_count <= 3) {
                    SpamEntry::create([
                        'ip_address' => $ipAddress,
                        'complaints' => $request->complaint,
                        'expectation' => $request->expectation,
                        'email' => $request->email,
                        'site' => $request->site,
                        'name' => $request->name,
                        'kode' => $request->kode,
                    ]);

                    return redirect()->back()->with('success-spam', 'your complaints are considered spam');
                }
            } else {
                BlockedIP::create([
                    'ip_address' => $ipAddress,
                    'spam_count' => 1,
                ]);

                SpamEntry::create([
                    'ip_address' => $ipAddress,
                    'email' => $request->email,
                    'name' => $request->name,
                    'code' => $request->code,
                    'site' => $request->site,
                    'complaints' => $request->complaint,
                    'expectation' => $request->expectation,
                ]);
                return redirect()->back()->with('success-spam', 'your complaints are considered spam');
            }
        }

        Session::flash('additionalData', compact('complaint'));
        return Redirect::back()->with('success', 'Form submitted successfully');
    }

}
