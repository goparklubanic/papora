<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Ccd_budget;
use App\Models\Ccd_indicator;

class CcdBudgetController extends Controller
{
    public function fillbuddget(){

        // 1. Get the indicators collection
        $indicators = Ccd_indicator::where('sk_id', '!=', '00')->get();

        // 2. Iterate using foreach
        foreach ($indicators as $indicator) {
            Ccd_budget::create([
                'budget_hash' => (string) \Illuminate\Support\Str::uuid(),
                'master_ik' => $indicator->master_ik,
                't1' => 0,
                't2' => 0,
                't3' => 0,
                't4' => 0,
                't5' => 0,
            ]);
        }
        return response()->json(['message' => 'Budgets filled successfully']);
    }
}
