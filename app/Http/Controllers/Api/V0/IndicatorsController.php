<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ccd_indicator;
use Illuminate\Support\Facades\Schema;

class IndicatorsController extends Controller
{
    public function getIndi(Request $request){
        $data = $request->data;
        $result = Ccd_indicator::select('master_ik','indikator')
        ->where('indikator','like',$data.'%')
        ->limit(20)->get();

        return response()->json([
            'message'=>'data ditemukan',
            'data'=>$result
        ]);
    }

    public function getindiData($master_ik){
        $data = Ccd_indicator::where('master_ik',$master_ik)->get();
        return response()->json($data);
    }

    public function indi_update(Request $req)
    {
        // $data=$req->master_ik;
        
        // Find the match record
        $indicator = Ccd_indicator::where('master_ik',$req->master_ik)->firstOrFail();

        // Get all real columns in the table
        $columns = Schema::getColumnListing($indicator->getTable());

        // keep only fields match request
        $data = collect($req->all())
        ->except(['master_ik'])
        ->only($columns)
        ->toArray();

        $indicator->update($data);

        return response()->json([
            'success' => true,
            'data' => $indicator->fresh(),
        ]);

    }
}
