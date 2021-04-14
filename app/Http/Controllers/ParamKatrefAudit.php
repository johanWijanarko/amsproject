<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamKatrefAudit extends Controller
{
    //
    function index(){
        return view('parameter/refAudit.index');
    }
}
