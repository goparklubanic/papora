<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ccd_indicator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class IndicatorsController extends Controller
{
    public function getIndi(Request $request){

        $request->validate([
            'data' => ['required', 'string', 'max:255'],
         ]);

        $search = addcslashes($request->input('data'), '%_\\');

        $result = Ccd_indicator::select('master_ik', 'indikator')
        ->where('indikator', 'like', $search . '%')
        ->limit(20)
        ->get();

        return response()->json([
            'message'=>'data ditemukan',
            'data'=>$result
        ]);
    }

    public function getindiData($master_ik)
    {
        $validator = Validator::make(
            ['master_ik' => $master_ik],
            ['master_ik' => ['required', 'string', 'regex:/^\d{2}(-\d{2}){5}$/']]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid master_ik format',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Ccd_indicator::where('master_ik', $master_ik)->get();

        return response()->json($data);
    }

    public function indi_update(Request $req)
    {
        // $data=$req->master_ik;
        // data validation
        $vdata = $this->indValidate($req);
        
        // Find the match record
        $indicator = Ccd_indicator::where('master_ik',$req->master_ik)->firstOrFail();

        // Whitelist of allowed fields for mass update (prevents column injection)
        $allowedFields = [
            'ik_id', 'indikator', 'satuan', 'baseline', 't1', 't2', 't3', 't4', 't5',
            'iku_alasan', 'iku_formulasi', 'iku_tipehitung', 'iku_do', 'iku_sumberdata', 'iku_penjab',
            'tt1_tw1','tt1_tw2','tt1_tw3','tt1_tw4','tt2_tw1','tt2_tw2','tt2_tw3','tt2_tw4','tt3_tw1','tt3_tw2','tt3_tw3','tt3_tw4','tt4_tw1','tt4_tw2','tt4_tw3','tt4_tw4','tt5_tw1','tt5_tw2','tt5_tw3','tt5_tw4',
            'ct1_tw1','ct1_tw2','ct1_tw3','ct1_tw4','ct2_tw1','ct2_tw2','ct2_tw3','ct2_tw4','ct3_tw1','ct3_tw2','ct3_tw3','ct3_tw4','ct4_tw1','ct4_tw2','ct4_tw3','ct4_tw4','ct5_tw1','ct5_tw2','ct5_tw3','ct5_tw4',
        ];

        // keep only fields that match the whitelist (not all 57 DB columns)
        $data = collect($vdata)
        ->except(['master_ik'])
        ->only($allowedFields)
        ->toArray();

        $indicator->update($data);

        return response()->json([
            'success' => true,
            'data' => $indicator->fresh(),
        ]);

    }

    private function indValidate($req){
        $data = $req->validate([
            'master_ik'      => ['required', 'string','regex:/^\d{2}(-\d{2}){5}$/', 'exists:ccd_indicators,master_ik'],
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

        return $data;
    }
}
