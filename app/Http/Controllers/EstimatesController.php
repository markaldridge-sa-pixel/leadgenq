<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Estimate;
use Illuminate\Support\Facades\Request;

class EstimatesController extends Controller
{

    public function index()
    {
        /* return Inertia::render('Estimates/Index', [
            'estimates' => Estimate::all()->map(function ($estimate) {
                return [
                    'filters' => Request::all('search'),
                    'id' => $estimate->id,
                    'min_value_total' => $estimate->min_value_total,
                    'min_value_total' => $estimate->max_value_total,

                ];
            }),

        ]);*/
        $estimates = Estimate::all();
        return $estimates;
    }
}
