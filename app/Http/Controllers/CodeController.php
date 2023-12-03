<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use App\Models\Mails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CodeController extends Controller
{
    public function index_code()
    {
        $codes = Codes::all();

        return view('index-code', compact('codes'));
    }

    public function store_code(Request $request)
    {
        $request->validate([
            'code'=> 'required',
        ]);


        Codes::create([
            'code' => $request->code,
        ]);


        return Redirect::back()->with('success', 'Form submitted successfully.');
    }



    public function delete_codes(Codes $codes)
    {
        $codes->delete();
        return Redirect::back()->with('success', 'Deleted successfully.');
    }

    public function getDataForSearch()
{
    $codes = Codes::pluck('code')->toArray(); // Ambil semua kode dari model Codes
    return response()->json(['codes' => $codes]);
}

}