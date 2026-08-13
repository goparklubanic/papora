<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ccd_indicator;

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
}
