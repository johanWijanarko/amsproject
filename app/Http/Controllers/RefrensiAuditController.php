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

    function tambah(){
        $kategori = DB::table('par_kategori_ref')
        ->select('kategori_ref_id', 'kategori_ref_name')
        ->where('kategori_ref_del_st', 1)
        ->get();

        $tahun = DB::table('par_tahun')->get();
        
        return view('refrensi_audit.tambah',compact('kategori', 'tahun'));
        // dd($kategori);
    }

    function save(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        $path = $request->file('lampiran')->store('upload');
        // dd($path);
        DB::table('ref_audit')->insert([
            'ref_audit_id' =>$uuid,
            'ref_audit_id_kategori' =>$request->kategori,
            'ref_audit_no_kode' =>$request->nomorkode,
            'ref_audit_tahun' =>$request->tahun,
            'ref_audit_nama' =>$request->refrensi,
            'ref_audit_desc' =>$request->keterangan,
            'ref_audit_link' =>$request->link,
            'ref_audit_attach' =>$path,
            'ref_audit_del_st' => 1
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('/rfaudit');
    }

    public function delete(Request $request, $id){
        $affected = DB::table('ref_audit')
        ->where('ref_audit_id', $id)
        ->update([ 'ref_audit_del_st' => 0
        ]);
        Alert::success('Success','Data berhasil di Hapus');
        return redirect('/rfaudit');
    }
}
