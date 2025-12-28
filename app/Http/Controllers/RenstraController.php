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

    public function indi_view($master_ik)
    {
        $topic = $this->eval_ik($master_ik);
        // echo $topic;
        return view('renstra.indi_view',compact('master_ik','topic'));
    }
    
    private function eval_ik($master_ik){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id,$ik_id) = explode("-",$master_ik);
        // echo "tj_id: $tj_id, ss_id: $ss_id, pg_id: $pg_id, kg_id: $kg_id, sk_id: $sk_id, ik_id: $ik_id";
        if($sk_id != "00"){
            return "Sub Kegiatan";
        }else{
            if($kg_id != "00"){
                return "Kegiatan";
            }else{
                if($pg_id != "00"){
                    return "Program";
                }else{
                    if($ss_id != "00"){
                        return "Sasaran";
                    }else{
                        return "Tujuan";
                    }
                }
            }
        }
    }
}
