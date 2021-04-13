<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class PustakaProgramController extends Controller
{
    //
    public function index(){
        $refprogram = DB::table('ref_program_audit')
        ->leftjoin('par_audit_type', 'ref_program_id_type', '=','audit_type_id')
        ->leftjoin('par_aspek', 'ref_program_aspek_id', '=', 'aspek_id')
        ->select('ref_program_id', 
        'audit_type_name', 'ref_program_id_type', 'ref_program_code', 'ref_program_code_sub', 'ref_program_aspek_id', 'ref_program_title', 'ref_program_procedure', 'aspek_name',  DB::raw("CONCAT(ref_program_code,'-',ref_program_title) as judul"),'audit_type_name', 'ref_program_del_st')
        ->where('ref_program_del_st', 1)
        ->orderby('ref_program_code', 'asc')->paginate(10);
        // dd($refprogram);
        return view('pustaka_audit.index', compact('refprogram'));
    }

    public function cari(Request $request){
        $cari = $request->cari;
        $refprogram = DB::table('ref_program_audit')
        ->leftjoin('par_audit_type', 'ref_program_id_type', '=','audit_type_id')
        ->leftjoin('par_aspek', 'ref_program_aspek_id', '=', 'aspek_id')
        ->select('ref_program_id', 
        'audit_type_name', 'ref_program_id_type', 'ref_program_code', 'ref_program_code_sub', 'ref_program_aspek_id', 'ref_program_title', 'ref_program_procedure', 'aspek_name','audit_type_name')
        ->where('ref_program_del_st', 1)
        ->where('ref_program_title', $cari)
        ->paginate(10);
        return view('pustaka_audit.index', compact('refprogram'));
    }

    function tambah_pustaka_prog (){

        $aspek = DB::table('par_aspek')
        ->select('aspek_id', 'aspek_name')
        ->where('aspek_del_st', 1)
        ->get();

        return view('pustaka_audit.tambah_pustaka',compact('aspek'));
    }

    function save_pustaka_prog(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        
        DB::table('ref_program_audit')->insert([
            'ref_program_id' =>$uuid,
            'ref_program_aspek_id' =>$request->aspek,
            'ref_program_code' =>$request->code,
            'ref_program_title' =>$request->title,
            'ref_program_code_sub' =>$request->code_sub,
            'ref_program_procedure' =>$request->procedure,
            'ref_program_del_st'=> 1
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('/pustaka_prog');
    }

    function edit_pustaka_prog($id){
        // var_dump($id); die();
        $editPustaka = DB::table('ref_program_audit')
        ->leftjoin('par_audit_type', 'ref_program_id_type', '=', 'audit_type_id')
        ->leftjoin('par_aspek', 'ref_program_aspek_id', '=', 'aspek_id')
        ->leftjoin('program_audit', 'program_id_ref', '=', 'ref_program_id')
        ->where('ref_program_del_st', 1)
        ->where('ref_program_id', $id)
        ->select('ref_program_id','ref_program_aspek_id','ref_program_code_sub','ref_program_code','ref_program_title','ref_program_procedure','aspek_name'
        )->get();

        $aspek = DB::table('par_aspek')
        ->select('aspek_id', 'aspek_name')
        ->where('aspek_del_st', 1)
        ->get();
        return view('pustaka_audit.edit_pustaka', compact('editPustaka', 'aspek'));
    }

    function update_pustaka_prog(Request $request, $id){
        $affected = DB::table('ref_program_audit')
        ->where('ref_program_id', $id)
        ->update([
            'ref_program_aspek_id' =>$request->aspek,
            'ref_program_code' =>$request->code,
            'ref_program_title' =>$request->title,
            'ref_program_code_sub' =>$request->code_sub,
            'ref_program_procedure' =>$request->procedure
        ]);
        Alert::success('Success','Data berhasil di Update');
        return redirect('/pustaka_prog');
    }

    function detail_pustaka_prog($id){
        // var_dump($id); die();
        $detailPustaka = DB::table('ref_program_audit')
        ->leftjoin('par_audit_type', 'ref_program_id_type', '=', 'audit_type_id')
        ->leftjoin('par_aspek', 'ref_program_aspek_id', '=', 'aspek_id')
        ->leftjoin('program_audit', 'program_id_ref', '=', 'ref_program_id')
        ->where('ref_program_del_st', 1)
        ->where('ref_program_id', $id)
        ->select('ref_program_code_sub','ref_program_code','ref_program_title','ref_program_procedure','aspek_name'
        )->get();
        // dd($detailPustaka);
        return view('pustaka_audit.detail_pustakaAudit',compact('detailPustaka'));
    }
}
