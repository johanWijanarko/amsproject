<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamKelompokTemuan extends Controller
{
    //
    function index(){
        return view('parameter/kelompoktemuan.index');
    }
}
