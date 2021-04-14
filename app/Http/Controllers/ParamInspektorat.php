<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class ParamInspektorat extends Controller
{
    //
    function index(){
        $inspektorat = DB::table('par_inspektorat')
        ->where('inspektorat_del_st', 1)->paginate(10);
        // dd($inspektorat);
        return view('parameter/inspektorat.index', compact('inspektorat'));
    }

    function tambah(){
        return view('parameter/inspektorat.tambah_data');
    }

    function save_inspektorat(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        DB::table('par_inspektorat')->insert
        ([
            'inspektorat_id' =>$uuid,
            'inspektorat_name' =>$request->nama,
            'inspektorat_del_st' => 1
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('paraminspektorat');
    }

    function edit(Request $request, $id){
        $inspektorat = DB::table('par_inspektorat')
        ->select('inspektorat_id', 'inspektorat_name')
        ->where('inspektorat_del_st', 1)
        ->where('inspektorat_id', $id)->first();
        // dd($inspektorat);
        return view('parameter/inspektorat.update_data', compact('inspektorat'));
    }
    function update_inspektorat(Request $request, $id){
        // dd($id);
        $affected = DB::table('par_inspektorat')
        ->where('inspektorat_id', $id)
        ->update([
            'inspektorat_name'=>$request->nama
        ]);
        Alert::success('Success','Data berhasil di Update');
        return redirect('paraminspektorat');
    }

    function delete(Request $request, $id){
        $affected = DB::table('par_inspektorat')
        ->where('inspektorat_id', $id)
        ->update([
            'inspektorat_del_st'=>0
        ]);
        Alert::success('Success','Data berhasil di Hapus');
        return redirect('paraminspektorat');
    }
}
