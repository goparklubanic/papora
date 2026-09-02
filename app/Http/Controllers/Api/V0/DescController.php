<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ccd_desc;
use App\Models\Ccd_indicator;
use App\Models\Ccd_budget;
// use PHPUnit\Metadata\After;
use Illuminate\Support\Facades\Validator;

class DescController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }
    public function fetch(){
        
        if(isset($_GET['mi']) && isset($_GET['sec'])){
            $mi = $_GET['mi'];
            $sec = $_GET['sec'];
            $validator = Validator::make(
                [$mi => ['required','string','regex:/^\d{2}(-\d{2}){4}$/']],
                [$sec => ['required', 'in:tj,ss,pg,kg,sk']]
            );

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Invalid parameter',
                    'errors' => $validator->errors(),
                ], 422);
            }

            switch($sec){
                case 'tj': 
                    $resp =  $this->findTujuan($mi);
                    break;
                case 'ss': 
                    $resp =  $this->findSasaran($mi);
                    break;
                case 'pg': 
                    $resp =  $this->findProgram($mi);
                    break;
                case 'kg': 
                    $resp =  $this->findKegiatan($mi);
                    break;
                case 'sk': 
                    $resp =  $this->findSubkegiatan($mi);
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
        $data = $request->validate([
            'master_id'=>['required','string','regex:/^\d{2}(-\d{2}){4}$/'],
            'deskripsi_1'=>['required','string','max:300'],
            'deskripsi_2'=>['sometimes','nullable','string']
        ]);

        $master_id = $data['master_id'];
        // $deskripsi_1 = $request->deskripsi_1;
        // $deskripsi_2 = $request->deskripsi_2;
        $response = Ccd_desc::where('master_id',$master_id)
            ->update($data);
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
        $mik = $request->validate([
            'master_ik'=>['required','string','regex:/^\d{2}(-\d{2}){5}$/', 'exists:ccd_indicators,master_ik'],
        ]);

        $vmik = $mik['master_ik'];

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

        $vdata = $this->indValidate($indicatorData);
        $vbudget = $this->indValidateBudget($budgetData);

        Ccd_indicator::where('master_ik', $vmik)->update($vdata);

        $setbudget = $this->setbudget($vmik, $vbudget);
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
    public function getIndikatorDanBudget($master_ik){
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


    public function allSK(){
        $tahun = (int) date('Y');

        // 1. Validasi rentang tahun (2026 s.d 2030)
        if ($tahun < 2026 || $tahun > 2030) {
            return response()->json(['message' => 'Data tidak ditemukan', 'data' => NULL], 404);
        }

        // 2. Hitung suffix/angka untuk nama kolom (2026 -> 1, 2027 -> 2, dst)
        $suffix = $tahun - 2025;

        // 3. Definisikan kolom statis (sama untuk semua tahun)
        $staticColumns = [
            "ccd_descs.master_id",
            "ccd_descs.deskripsi_1",
            "ccd_descs.deskripsi_2",
            "ccd_indicators.indikator",
        ];
        
        // 4. Definisikan kolom dinamis (berubah sesuai tahun menggunakan variabel $suffix)
        $dynamicColumns = [
            "ccd_budgets.master_ik as ik_id",
            "ccd_budgets.t{$suffix} as ta",
            "ccd_budgets.ct{$suffix}_tw1 as ra1",
            "ccd_budgets.ct{$suffix}_tw2 as ra2",
            "ccd_budgets.ct{$suffix}_tw3 as ra3",
            "ccd_budgets.ct{$suffix}_tw4 as ra4",
            "ccd_indicators.t{$suffix} as tk",
            "ccd_indicators.ct{$suffix}_tw1 as rk1",
            "ccd_indicators.ct{$suffix}_tw2 as rk2",
            "ccd_indicators.ct{$suffix}_tw3 as rk3",
            "ccd_indicators.ct{$suffix}_tw4 as rk4",
        ];

        // 5. Gabungkan semua kolom
        $selectColumns = array_merge($staticColumns, $dynamicColumns);

        // 6. Eksekusi Query (hanya ditulis sekali)
        $data = Ccd_indicator::select($selectColumns)
            ->join('ccd_descs', 'ccd_indicators.master_id', '=', 'ccd_descs.master_id')
            ->join('ccd_budgets', 'ccd_indicators.master_ik', '=', 'ccd_budgets.master_ik')
            ->where('ccd_descs.sk_id', '!=', '00')
            ->orderBy('ccd_descs.master_id')
            ->get();

        return response()->json([
            "message" => "Data ditemukan",
            "data" => $data
        ]);
    }

    public function allKG($tahun){
    $tahun = (int) $tahun;
    
    // 1. Validasi rentang tahun agar $suffix tidak error
    if ($tahun < 2026 || $tahun > 2030) {
        return response()->json(['message' => 'Tahun tidak valid', 'data' => null], 400);
    }

    $suffix = $tahun - 2025;

    // 2. Query utama dengan Eager Loading (with)
    $descs = Ccd_desc::select('master_id', 'deskripsi_1', 'deskripsi_2')
        ->where('sk_id', '00')
        ->where('kg_id', '!=', '00')
        ->with(['indicators' => function ($query) use ($suffix) {
            // 3. Select kolom dinamis untuk tabel ccd_indicators
            $query->select(
                "ccd_indicators.master_id", // WAJIB: Eloquent butuh foreign key ini untuk mencocokkan data
                "ccd_indicators.master_ik", 
                "ccd_indicators.indikator",
                // Kolom Indikator
                "ccd_indicators.t{$suffix} as tk",
                "ccd_indicators.ct{$suffix}_tw1 as rk1",
                "ccd_indicators.ct{$suffix}_tw2 as rk2",
                "ccd_indicators.ct{$suffix}_tw3 as rk3",
                "ccd_indicators.ct{$suffix}_tw4 as rk4",
                // kolom budget
                DB::raw("(SELECT SUM(t{$suffix}) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 11), '%')) as ta"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw1) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 11), '%')) as ra1"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw2) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 11), '%')) as ra2"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw3) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 11), '%')) as ra3"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw4) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 11), '%')) as ra4")
            );
            // ->join("ccd_budgets",function($join){
            //     $join->on('ccd_masger_ik','LIKE',DB::raw("CONCAT(SUBSTR(ccd_indicators.master_ik,1,11),'%')"));
            // });
        }])
        ->get();

        return response()->json([
            "message" => "Data ditemukan",
            "data" => $descs
        ]);
    }

    public function allPG($tahun){
    $tahun = (int) $tahun;
    
    // 1. Validasi rentang tahun agar $suffix tidak error
    if ($tahun < 2026 || $tahun > 2030) {
        return response()->json(['message' => 'Tahun tidak valid', 'data' => null], 400);
    }

    $suffix = $tahun - 2025;

    // 2. Query utama dengan Eager Loading (with)
    $descs = Ccd_desc::select('master_id', 'deskripsi_1', 'deskripsi_2')
        ->where('sk_id', '00')
        ->where('kg_id', '00')
        ->where('pg_id','!=','00')
        ->with(['indicators' => function ($query) use ($suffix) {
            // 3. Select kolom dinamis untuk tabel ccd_indicators
            $query->select(
                "ccd_indicators.master_id", // WAJIB: Eloquent butuh foreign key ini untuk mencocokkan data
                "ccd_indicators.master_ik", 
                "ccd_indicators.indikator",
                // Kolom Indikator
                "ccd_indicators.t{$suffix} as tk",
                "ccd_indicators.ct{$suffix}_tw1 as rk1",
                "ccd_indicators.ct{$suffix}_tw2 as rk2",
                "ccd_indicators.ct{$suffix}_tw3 as rk3",
                "ccd_indicators.ct{$suffix}_tw4 as rk4",
                // Kolom Budget
                // Gunakan Subquery untuk SUM. Ini menghindari kebutuhan JOIN dan GROUP BY
                DB::raw("(SELECT SUM(t{$suffix}) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 8), '%')) as ta"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw1) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 8), '%')) as ra1"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw2) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 8), '%')) as ra2"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw3) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 8), '%')) as ra3"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw4) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 8), '%')) as ra4")
            );
        }])
        ->get();

        return response()->json([
            "message" => "Data ditemukan",
            "data" => $descs
        ]);
    }

    public function allSS($tahun){
    $tahun = (int) $tahun;
    
    // 1. Validasi rentang tahun agar $suffix tidak error
    if ($tahun < 2026 || $tahun > 2030) {
        return response()->json(['message' => 'Tahun tidak valid', 'data' => null], 400);
    }

    $suffix = $tahun - 2025;

    // 2. Query utama dengan Eager Loading (with)
    $descs = Ccd_desc::select('master_id', 'deskripsi_1', 'deskripsi_2')
        ->where('sk_id', '00')
        ->where('kg_id', '00')
        ->where('pg_id','00')
        ->where('ss_id','!=','00')
        ->with(['indicators' => function ($query) use ($suffix) {
            // 3. Select kolom dinamis untuk tabel ccd_indicators
            $query->select(
                "ccd_indicators.master_id", // WAJIB: Eloquent butuh foreign key ini untuk mencocokkan data
                "ccd_indicators.master_ik", 
                "ccd_indicators.indikator",
                // Kolom Indikator
                "ccd_indicators.t{$suffix} as tk",
                "ccd_indicators.ct{$suffix}_tw1 as rk1",
                "ccd_indicators.ct{$suffix}_tw2 as rk2",
                "ccd_indicators.ct{$suffix}_tw3 as rk3",
                "ccd_indicators.ct{$suffix}_tw4 as rk4",
                // Kolom Budget
                DB::raw("(SELECT SUM(t{$suffix}) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 5), '%')) as ta"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw1) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 5), '%')) as ra1"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw2) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 5), '%')) as ra2"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw3) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 5), '%')) as ra3"),
                DB::raw("(SELECT SUM(ct{$suffix}_tw4) FROM ccd_budgets WHERE master_ik LIKE CONCAT(SUBSTR(ccd_indicators.master_ik, 1, 6), '%')) as ra4")
            );
        }])
        ->get();

        return response()->json([
            "message" => "Data ditemukan",
            "data" => $descs
        ]);
    }

    public function getAnalisa($master_ik){
        $data = Ccd_indicator::select('masalah','solusi','analisa')
        ->where('master_ik',$master_ik)->first();
        return response()->json([
            "message"=>"Data ditemukan",
            "data"=>$data
        ]);
    }

    public function setAnalisa(Request $request){
        
        if(
            Ccd_indicator::where('master_ik',$request->master_ik)
            ->update([
                'masalah'=>$request->masalah,
                'solusi'=>$request->solusi,
                'analisa'=>$request->analisa
            ])
        ){
            return response()->json([
                'status'=>'success',
                'message'=>"Data berhasil disimpan"
            ]);
        }else{
            return response()->json([
                'status'=>'failded',
                'message'=>"Data gagal disimpan"
            ]);
        }
        // return response()->json($request->all());
        
    }
    
    // New Sub Kegiatan
    // Daftar kegiatan
    public function lstsk(){

        $data = Ccd_desc::where('tj_id','!=','00')
        ->where('ss_id','!=','00')
        ->where('pg_id','!=','00')
        ->where('kg_id','!=','00')
        ->where('sk_id','=','00')
        ->orderBy('master_id')
        ->get(['master_id','deskripsi_1']);

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }

    public function skmax($master_id){
        // $products = DB::table('products')
        // ->select('category_id', DB::raw('MAX(price) as highest_price'))
        // ->groupBy('category_id')
        // ->get();
        $mid = substr($master_id,0,11)."%";
        $skmax = DB::table('ccd_descs')
        ->select(DB::raw('MAX(sk_id) + 1 as sk_id'))
        ->where('master_id','like',$mid)
        ->get();

        return response()->json([
            'status'=>'success',
            'data'=>$skmax
        ]);
    }

    public function skbaru(Request $req){
        $deskripsi = $req->deskripsi;
        $indikator = $req->indikator;
        $budgeting = $req->budget;

        $data_deskripsi = [
            "master_id"=>$deskripsi->master_id,
            "tj_id"=>$deskripsi->tj_id,
            "ss_id"=>$deskripsi->ss_id,
            "pg_id"=>$deskripsi->pg_id,
            "kg_id"=>$deskripsi->kg_id,
            "sk_id"=>$deskripsi->sk_id,
            "deskripsi_1"=>$deskripsi->deskripsi_1
        ];

        $data_indikator = [
            "master_ik"=>$indikator->master_ik,
            "master_id"=>$indikator->master_id,
            "ik_id"=>'01',
            "indikator"=>$indikator->indikator,
            "baseline"=>$indikator->baseline,
            "satuan"=>$indikator->satuan,
            "t1"=>$indikator->t1,
            "t2"=>$indikator->t2,
            "t3"=>$indikator->t3,
            "t4"=>$indikator->t4,
            "t5"=>$indikator->t5,
            "iku_alasan"=>$indikator->iku_alasan,
            "iku_tipehitung"=>$indikator->tipehitung,
            "iku_formulasi"=>$indikator->formulasi,
            "iku_do"=>$indikator->do,
            "iku_penjab"=>$indikator->iku_penjab,
            "iku_sumberdata"=>$indikator->sumberdata
        ];

        $data_budgeting = [
            "budget_has"=> (string) \Illuminate\Support\Str::uuid(),
            "master_ik"=>$budgeting->master_ik,
            "t1"=>$budgeting->t1,
            "t2"=>$budgeting->t2,
            "t3"=>$budgeting->t3,
            "t4"=>$budgeting->t4,
            "t5"=>$budgeting->t5,
        ];

        $response = [
            'status'=>'success',
            'data'=>[
                'desk'=>$data_deskripsi,
                'indi'=>$data_indikator,
                'bdgt'=>$data_budgeting
            ]
        ];

        return response()->json($response);
    }

    private function indValidate($data){
        $validator = Validator::make($data, [
            'master_ik'      => ['required', 'string', 'regex:/^\d{2}(-\d{2}){5}$/'],
            'ik_id'          => ['sometimes', 'string', 'max:2'],
            'indikator'      => ['sometimes', 'string'],
            'satuan'         => ['sometimes', 'string', 'max:255'],
            'baseline'       => ['sometimes', 'nullable', 'string', 'max:255'],
            't1'             => ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'],
            't2'             => ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'],
            't3'             => ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'],
            't4'             => ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'],
            't5'             => ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'],
            'iku_alasan'     => ['sometimes', 'nullable', 'string'],
            'iku_formulasi'  => ['sometimes', 'nullable', 'string'],
            'iku_tipehitung' => ['sometimes', 'nullable', 'string'],
            'iku_do'         => ['sometimes', 'nullable', 'string'],
            'iku_sumberdata' => ['sometimes', 'nullable', 'string'],
            'iku_penjab'     => ['sometimes', 'nullable', 'string'],
        ]);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return $validator->validated();
    }

    private function indValidateBudget($data){
        $rules = [];
        for ($tt = 1; $tt <= 5; $tt++) {
            $rules["t{$tt}"] = ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'];
            for ($tw = 1; $tw <= 4; $tw++) {
                $rules["ct{$tt}_tw{$tw}"] = ['sometimes', 'nullable', 'numeric', 'between:-999999.99,999999.99'];
            }
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return $validator->validated();
    }
}

/*
cek master_ik indikator dan budgets
SELECT i.master_ik AS indi_ika, COALESCE(b.master_ik, '0') AS bg_ik FROM ccd_indicators i LEFT JOIN ccd_budgets b ON i.master_ik = b.master_ik;
*/