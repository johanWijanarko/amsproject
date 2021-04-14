<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamInspektorat extends Controller
{
    //
    function index(){
        return view('parameter/inspektorat.index');
    }
}
