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

        $R1 = $interest/100;
        $R2 = $year + ($month/12) + ($day/365);
        $CI = $principle_amount*(pow(($R1/$no_of_time)+1,$no_of_time*$R2));
        return redirect('/calculator')->with('info','Your Compond Interest is :'.$CI);
        
     }
}
