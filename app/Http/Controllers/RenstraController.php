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

    public function desc_edit($master_id)
    {
        return view('renstra.desc_edit',compact('master_id'));
    }

    public function indi_edit($master_ik)
    {
        return view('renstra.indi_edit',compact('master_ik'));
    }
}
