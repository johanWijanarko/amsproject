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
        $refaudit = DB::table('ref_audit')
        ->leftjoin('par_kategori_ref', 'ref_audit_id_kategori', '=', 'kategori_ref_id')
        ->select('ref_audit_id', 'ref_audit_no_kode' , 'ref_audit_nama', 'ref_audit_desc', 'kategori_ref_name', 'ref_audit_attach', 'ref_audit_link')
        ->where('ref_audit_del_st', 1)
        ->paginate(10);
        // ->get();
        // dd($refaudit);
        return view('refrensi_audit.index',compact('refaudit'));
    }

    function cari(Request $request){
        $cari = $request->cari;
        $refaudit = DB::table('ref_audit')
        ->leftjoin('par_kategori_ref', 'ref_audit_id_kategori', '=', 'kategori_ref_id')
        ->select('ref_audit_id', 'ref_audit_no_kode' , 'ref_audit_nama', 'ref_audit_desc', 'kategori_ref_name', 'ref_audit_attach', 'ref_audit_link')
        ->where('ref_audit_del_st', 1)
        ->where('ref_audit_nama', $cari)
        ->paginate(10);
        // ->get();
        // dd($refaudit);
        return view('refrensi_audit.index',compact('refaudit'));
    }
}
