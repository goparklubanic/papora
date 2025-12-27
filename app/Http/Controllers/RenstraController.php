<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RenstraController extends Controller
{
    public function index()
    {
        return view('renstra.index');
    }

    public function jelajah()
    {
        return view('renstra.jelajah');
    }

    public function detail($master_id)
    {
        return view('renstra.detail',compact('master_id'));
    }
}
