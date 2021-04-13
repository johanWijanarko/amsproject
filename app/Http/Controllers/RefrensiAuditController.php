<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class RefrensiAuditController extends Controller
{
    //
    function index(){
        return view('refrensi_audit.index');
    }
}
