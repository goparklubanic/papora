<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalidataController extends Controller
{
    public function index()
    {
        return view('walidata.dashboard');
    }

    public function tarkin()
    {
        return view('walidata.form-indikator');
    }

    public function tarang()
    {
        return view('walidata.form-anggaran');
    }

    public function skbaru(){
        return view('walidata.form-sk');
    }
}
