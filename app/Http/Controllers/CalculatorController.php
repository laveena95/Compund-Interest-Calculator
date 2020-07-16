<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculatefunc(Request $request){
        $principle_amount = $request->input('principle_amount');
        $interest = $request -> input('interest');
        $year = $request -> input('year');
        $month = $request -> input('month');
        $day = $request -> input('day');
        $no_of_time = $request -> input('no_of_time');

        $CI = ($principle_amount*(1+($interest/$no_of_time))^($year*$no_of_time));
       return redirect('/calculator')->with('info','Your Compond Interest is :'.$CI);
        
     }
}
