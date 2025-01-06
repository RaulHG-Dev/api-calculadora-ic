<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CalculateDataRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Carbon;

class InterestController extends Controller
{
    /**
     * Calculate compound interest by year
     * @param CalculateDataRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function calculateByYear(CalculateDataRequest $request) {
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
    /**
     * Calculate compound interest by month
     * @param CalculateDataRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function calculateByMonth(CalculateDataRequest $request) {
        $capitalInicial = $request->capitalInicial;
        $interes = $request->interes;
        $anios = $request->anios;
        $result = collect();

        $counterMonth = 1;
        for ($year = 1; $year <= (int)$anios; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                $result->push([
                    'year' => $year,
                    'month' => $counterMonth,
                    'montfOfTheYear' => $month,
                    'monthName' => getMonthName($month),
                    'capital' => $capitalInicial * (1 + $interes / 100) ** ($year * $month / (12 * $year))
                ]);
                $counterMonth++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => $result
        ]);
    }
}
