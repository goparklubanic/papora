<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ccd_desc;
use App\Models\Ccd_indicator;
use App\Models\Ccd_budget;
// use PHPUnit\Metadata\After;

class DescController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }
    public function fetch(){
        if(isset($_GET['mi']) && isset($_GET['sec'])){
            switch($_GET['sec']){
                case 'tj': 
                    $resp =  $this->findTujuan($_GET['mi']);
                    break;
                case 'ss': 
                    $resp =  $this->findSasaran($_GET['mi']);
                    break;
                case 'pg': 
                    $resp =  $this->findProgram($_GET['mi']);
                    break;
                case 'kg': 
                    $resp =  $this->findKegiatan($_GET['mi']);
                    break;
                case 'sk': 
                    $resp =  $this->findSubkegiatan($_GET['mi']);
                    break;
                default: $resp=(['message'=>'undefinded']);
                break;
            }
            return response()->json($resp);
        }
    }

    public function findTujuan($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $tj_id = substr($master_id,0,2);
        $response = Ccd_desc::with('indicators')
            ->where('tj_id',$tj_id)
            ->where('ss_id', '00')
            ->where('pg_id', '00')
            ->where('kg_id', '00')
            ->where('sk_id', '00')
            ->select('master_id','deskripsi_1', 'deskripsi_2')
            ->get();
        
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function findSasaran($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $tj_id = substr($master_id,0,2);
        $response = Ccd_desc::with('indicators')
            ->where('tj_id',$tj_id)
            ->where('ss_id', $ss_id)
            ->where('pg_id', '00')
            ->where('kg_id', '00')
            ->where('sk_id', '00')
            ->select('master_id','deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function findProgram($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $tj_id = substr($master_id,0,2);
        $response = Ccd_desc::with('indicators')
            ->where('tj_id',$tj_id)
            ->where('ss_id', $ss_id)
            ->where('pg_id', $pg_id)
            ->where('kg_id', '00')
            ->where('sk_id', '00')
            ->select('master_id','deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }
    public function findKegiatan($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $tj_id = substr($master_id,0,2);
        $response = Ccd_desc::with('indicators')
            ->where('tj_id',$tj_id)
            ->where('ss_id', $ss_id)
            ->where('pg_id', $pg_id)
            ->where('kg_id', $kg_id)
            ->where('sk_id', '00')
            ->select('master_id','deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }
    public function findSubkegiatan($master_id){
        $response = Ccd_desc::with('indicators')
            ->where('master_id',$master_id)
            ->select('master_id','deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    private function codebreak($master_id){
        // list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id)
        return explode("-",$master_id);
    }

    public function getTujuan(){
        $response = Ccd_desc::where('tj_id','!=','00')
            ->where('ss_id', '00')
            ->where('pg_id', '00')
            ->where('kg_id', '00')
            ->where('sk_id', '00')
            ->select('master_id', 'deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function getSasaran($master_id){
        $tj_id = substr($master_id,0,2);
        $response = Ccd_desc::where('tj_id',$tj_id)
            ->where('ss_id', '!=','00')
            ->where('pg_id', '00')
            ->where('kg_id', '00')
            ->where('sk_id', '00')
            ->select('master_id', 'deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function getProgram($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $response = Ccd_desc::where('tj_id',$tj_id)
            ->where('ss_id', $ss_id)
            ->where('pg_id', '!=','00')
            ->where('kg_id', '00')
            ->where('sk_id', '00')
            ->select('master_id', 'deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function getKegiatan($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $response = Ccd_desc::where('tj_id',$tj_id)
            ->where('ss_id', $ss_id)
            ->where('pg_id', $pg_id)
            ->where('kg_id', '!=','00')
            ->where('sk_id', '00')
            ->select('master_id', 'deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function getSubkegiatan($master_id){
        list($tj_id,$ss_id,$pg_id,$kg_id,$sk_id) = $this->codebreak($master_id);
        $response = Ccd_desc::where('tj_id',$tj_id)
            ->where('ss_id', $ss_id)
            ->where('pg_id', $pg_id)
            ->where('kg_id', $kg_id)
            ->where('sk_id', '!=','00')
            ->select('master_id', 'deskripsi_1', 'deskripsi_2')
            ->get();
        if($response->count() > 0){
            return $response;
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function detailcode($master_id){
        $tujuan = $this->findTujuan($master_id);
        $sasaran = $this->findSasaran($master_id);
        $program = $this->findProgram($master_id);
        $kegiatan = $this->findKegiatan($master_id);
        $subkegiatan = $this->findSubkegiatan($master_id);
        return response()->json([
            'tujuan' => $tujuan,
            'sasaran' => $sasaran,
            'program' => $program,
            'kegiatan' => $kegiatan,
            'subkegiatan' => $subkegiatan,
        ]);

    }

    public function detail($master_id){
        $tujuan = $this->findTujuan($master_id);
        $sasaran = $this->findSasaran($master_id);
        $program = $this->findProgram($master_id);
        $kegiatan = $this->findKegiatan($master_id);
        $subkegiatan = $this->findSubkegiatan($master_id);
        return response()->json([
            'tujuan' => $tujuan,
            'sasaran' => $sasaran,
            'program' => $program,
            'kegiatan' => $kegiatan,
            'subkegiatan' => $subkegiatan,
        ]);
    }

    public function getdescription($master_id){
        $response = Ccd_desc::where('master_id',$master_id)
            ->select('deskripsi_1', 'deskripsi_2')
            ->first();
        if($response->count() > 0){
            return response()->json($response);
        }else{
            return ['deskripsi_1'=>'','deskripsi_2'=>''];
        }
    }

    public function setdesctiption(Request $request){
        $master_id = $request->master_id;
        $deskripsi_1 = $request->deskripsi_1;
        $deskripsi_2 = $request->deskripsi_2;
        $response = Ccd_desc::where('master_id',$master_id)
            ->update(['deskripsi_1'=>$deskripsi_1, 'deskripsi_2'=>$deskripsi_2]);
        if($response){
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message'=>'failed']);
        }
    }

    public function getindikator($master_ik){
        // $mybudget = $this->getbudget($master_ik);
        $indikator = Ccd_indicator::where('master_ik',$master_ik)
            ->select('indikator', 'satuan', 'baseline', 't1', 't2', 't3', 't4', 't5','ct1','ct2','ct3','ct4','ct5')
            ->first();
        if($indikator->count() > 0){
            // $responses = ['indikator'=>$indikator,'budget'=>$mybudget];
            return response()->json($indikator);
            // return response()->json($responses);
        }else{
            return ['indikator'=>'','satuan'=>'','baseline'=>'','t1'=>'','t2'=>'','t3'=>'','t4'=>'','t5'=>''];
        }   
    }

    public function setindikator(Request $request){
        $master_ik = $request->master_ik;
        $data = $request->except(['_token', '_method']);

        $indicatorData = [];
        $budgetData = [];

        foreach ($data as $key => $value) {
            if (str_starts_with($key, 'vat')) {
                $budgetData[str_replace('vat', 't', $key)] = $value;
            } elseif (str_starts_with($key, 'cat')) {
                $budgetData[str_replace('cat', 'ct', $key)] = $value;
            } else {
                $indicatorData[$key] = $value;
            }
        }

        Ccd_indicator::where('master_ik', $master_ik)->update($indicatorData);

        $setbudget = $this->setbudget($master_ik, $budgetData);
        if ($setbudget) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'budget failed']);
        }
    }

    // View All Information
    public function getallindikator($master_ik){
        $master_id = substr($master_ik,0,14);
        $indikator = Ccd_indicator::where('master_ik',$master_ik)->first();
        $deskripsi = Ccd_desc::where('master_id',$master_id)
            ->select('tahun','deskripsi_1', 'deskripsi_2')
            ->first();
        if($indikator->count() > 0){
            return response()->json(['des'=>$deskripsi,'ind'=>$indikator]);
        }else{
            return ['des'=>['deskripsi_1'=>'','deskripsi_2'=>''],'ind'=>['indikator'=>'','satuan'=>'','baseline'=>'','t1'=>'','t2'=>'','t3'=>'','t4'=>'','t5'=>'','iku_alasan'=>'','iku_formulasi'=>'','iku_tipehitung'=>'','iku_do'=>'','iku_sumberdata'=>'']];
        }
    }

    // set budget
    public function setbudget($ik, $data){
        $budget = Ccd_budget::where('master_ik', $ik)->first();
        if ($budget) {
            $response = $budget->update($data);
        } else {
            $response = Ccd_budget::create(array_merge(
                ['budget_hash' => (string) \Illuminate\Support\Str::uuid(), 'master_ik' => $ik],
                $data
            ));
        }
        return (bool) $response;
    }

    
    // get budget
    public function getbudget($master_ik){
        $budget = Ccd_budget::where('master_ik',$master_ik)->first();
        if($budget->count() > 0){
            return response()->json($budget);
        }else{
            return ['t1'=>0,'t2'=>0,'t3'=>0,'t4'=>0,'t5'=>0, 
            'ct1_tw1'=>0,'ct1_tw2'=>0,'ct1_tw3'=>0,'ct1_tw4'=>0,
            'ct2_tw1'=>0,'ct2_tw2'=>0,'ct2_tw3'=>0,'ct2_tw4'=>0,
            'ct3_tw1'=>0,'ct3_tw2'=>0,'ct3_tw3'=>0,'ct3_tw4'=>0,
            'ct4_tw1'=>0,'ct4_tw2'=>0,'ct4_tw3'=>0,'ct4_tw4'=>0,
            'ct5_tw1'=>0,'ct5_tw2'=>0,'ct5_tw3'=>0,'ct5_tw4'=>0,
        ];
        }
    }

    // get indikator dan budget
    public function getIndikatorDanBudget($master_ik)
{
    // Ambil data indikator
    $indikator = Ccd_indicator::where('master_ik', $master_ik)->first();

    $indikatorData = $indikator
        ? $indikator->toArray()
        : ['indikator' => '', 'satuan' => '', 'baseline' => '', 't1' => '', 't2' => '', 't3' => '', 't4' => '', 't5' => ''];

    // Ambil data budget
    $budget = Ccd_budget::where('master_ik', $master_ik)->first();

    $budgetData = $budget
        ? $budget->toArray()
        : ['t1' => 0, 't2' => 0, 't3' => 0, 't4' => 0, 't5' => 0, 'cat1_tw1' => 0, 'cat2_tw1' => 0, 'cat3_tw1' => 0, 'cat4_tw1' => 0, 'cat5_tw1' => 0, 'cat1_tw2' => 0, 'cat2_tw2' => 0, 'cat3_tw2' => 0, 'cat4_tw2' => 0, 'cat5_tw2' => 0, 'cat1_tw3' => 0, 'cat2_tw3' => 0, 'cat3_tw3' => 0, 'cat4_tw3' => 0, 'cat5_tw3' => 0, 'cat1_tw4' => 0, 'cat2_tw4' => 0, 'cat3_tw4' => 0, 'cat4_tw4' => 0, 'cat5_tw4' => 0];

    // Kembalikan sebagai JSON gabungan
    return response()->json([
        'indikator' => $indikatorData,
        'budget'    => $budgetData,
    ]);
}
}
