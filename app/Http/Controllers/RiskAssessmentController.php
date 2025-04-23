<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiskAssessmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'debt_ratio' => 'required|numeric',
            'gross_pay' => 'required|numeric',
            'net_pay' => 'required|numeric',
            'risk_score' => 'required|numeric',
            'risk_level' => 'required|string',
        ]);

        // Save or log the data
        RiskAssessment::create($data); // make sure model/table exists

        return response()->json(['message' => 'Risk assessment submitted successfully.']);
    }

}
