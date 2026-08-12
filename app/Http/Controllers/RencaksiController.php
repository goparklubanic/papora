<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class RencaksiController extends Controller
{
    public function index(){
        return view('rensi.index');
    }

    public function ukin(){
        return view('rensi.ukur-kinerja');
    }
}
