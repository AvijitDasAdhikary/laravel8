<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $records1 = ['record1'];
        $records2 = [];

        $i = ['case1'];
        
        return view('dashboard',compact('records1','records2','i'));
    }
}
