<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CalculateDataRequest;

class InterestController extends Controller
{
    public function calculateCompoundInterest(CalculateDataRequest $request) {
        $capitalInicial = $request->capitalInicial;
        $interes = $request->interes;
        $anios = $request->anios;
        $result = collect();

        for ($year = 1; $year <= (int)$anios; $year++) {
            $result->push([
                'year' => $year,
                'capital' => $capitalInicial * (1 + $interes / 100) ** $year
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $result
        ]);
    }
}
