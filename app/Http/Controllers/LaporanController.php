<?php

namespace App\Http\Controllers;

use App\Models\Mails;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_laporan()
    {

         return view('index-laporan');

    }
    public function index_status()
    {

         return view('index-status');

    }

    public function search(Request $request)
{
    $request->validate([
        'q' => 'required|alpha_num|size:11',
        'g-recaptcha-response' => 'required|captcha'
    ], [
        'q.required' => 'The search field must be filled in',
        'q.alpha_num' => 'The search field can only contain letters and numbers',
        'q.size' => 'The search field must consist of 11 characters',

    ]);
    $query = $request->input('q');

    // Lakukan pencarian berdasarkan query
    $data = Mails::where('ticket', 'like', '%' . $query . '%')->get();

    return view('index-status', compact('data', 'query'));
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}