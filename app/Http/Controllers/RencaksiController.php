<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class RencaksiController extends Controller
{
    public function index(){
        return view('rensi.index');
    }

    public function ukin($master_ik){
        $topic = $this->eval_ik($master_ik);
        return view('rensi.ukur-kinerja',compact('master_ik','topic'));
    }

    public function iku($master_ik){
        return view('rensi.iku',compact('master_ik'));
    }

    private function eval_ik($master_ik){
        if($master_ik !=='00-00-00-00-00-00'){
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
        }else{
            return null;
        }
    }
}
