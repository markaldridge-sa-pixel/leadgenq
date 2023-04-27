<?php

namespace App\Http\Controllers;

use App\Models\Calculation;

class CalculationController extends Controller
{

    /**
     * Display a listing of the calculations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calculations = calculation::select("*")
            ->get()
            ->toArray();

        dd($calculations);
    }
}
