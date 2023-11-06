<?php

namespace App\Http\Controllers;

use App\Models\Mails;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InformaticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_informatic()
    {
        $sites = Sites::all();
        $informatics = Mails::select('id','complaints','email','complaints_image','status','site', 'page','created_at')->where('page','1')->get();



        return view('index-informatic', compact('informatics', 'sites'));
    }

    public function update_informatic(Request $request)
{
    $complaintId = $request->input('complaint_id');

    $request->validate([
        'status' => 'required',
    ]);

    $complaint = Mails::find($complaintId);

    if ($complaint) {
        $complaint->update([
            'status' => $request->status,
        ]);

        return redirect()->route('index-informatics')->with('success', 'The complaint status has been changed');
    }

    return redirect()->route('index-informatics')->with('error', 'Complaint not found');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}