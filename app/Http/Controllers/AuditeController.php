<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;


class AuditeController extends Controller
{
    //
    public function index(){
        $auditee = DB::table('auditee')
        ->leftJoin('par_esselon', 'auditee_parrent_id', '=', 'par_esselon.esselon_id')
        ->select('auditee_id','auditee_kode', 'auditee_name','esselon_name','auditee_email','auditee_show_status')
        ->where('auditee_del_st', '!=' ,'0' )
        ->orderBy('auditee_show_status', 'desc')
        ->orderBy('auditee_name', 'asc')
        ->paginate(10);
        // dd($auditee);
        return view('master_audite.index',compact('auditee'));
    }

    public function cari(Request $request){
        $cari = $request->cari;
        $auditee = DB::table('auditee')
        ->leftJoin('par_esselon', 'auditee_parrent_id', '=', 'par_esselon.esselon_id')
        ->select('auditee_id','auditee_kode', 'auditee_name','esselon_name','auditee_email','auditee_show_status')
        ->where([ 
            ['auditee_del_st', '!=' ,'0'],
            ['auditee_name','like',"%".$cari."%"]
        ])
        ->orderBy('auditee_show_status', 'desc')
        ->orderBy('auditee_name', 'asc')
        ->simplePaginate(10);
        // dd($auditee);
        return view('master_audite.index',compact('auditee'));
    }


    public function tambah_audite(Request $request){
        $maxId= DB::table('auditee')->count('auditee_id');
        $char = "AUD0";
        $kode = $char . $maxId;

        $eselon = DB::table('par_esselon')
        ->select('esselon_id', 'esselon_name')
        ->where('esselon_del_st', 1)
        ->get();

        $inspektorat = DB::table('par_inspektorat')
        ->select('inspektorat_id', 'inspektorat_name')
        ->where('inspektorat_del_st', 1)->get();
        
        $provinsi = DB::table('par_propinsi')
        ->select('propinsi_id', 'propinsi_name')
        ->where('propinsi_del_st', 1)->get();
        // dd($provinsi);

        return view('master_audite.tambah_auditee',compact('kode', 'eselon', 'inspektorat', 'provinsi'));
    }

    public function city(Request $request)
    {
        $cities = DB::table('par_kabupaten')
        ->where('kabupaten_id_prov', $request->get('id'))
        ->pluck('kabupaten_name', 'kabupaten_id');
        // dd($cities);
        return response()->json($cities);
    }

    public function detail($id){
        $audite_detail = DB::table('auditee')
        ->leftJoin('par_esselon', 'auditee_parrent_id', '=', 'par_esselon.esselon_id')
        ->leftJoin('par_inspektorat', 'auditee_inspektorat_id', '=', 'par_inspektorat.inspektorat_id')
        ->leftJoin('par_propinsi', 'auditee_propinsi_id', '=', 'par_propinsi.propinsi_id')
        ->leftJoin('par_kabupaten', 'auditee_kabupaten_id', '=', 'par_kabupaten.kabupaten_id')
        ->select('auditee_id','auditee_kode', 'auditee_name','esselon_name','inspektorat_name','propinsi_name','kabupaten_name','auditee_email','auditee_show_status', 'auditee_alamat','auditee_telp', 'auditee_ext', 'auditee_fax')
        ->where('auditee_del_st', '!=' ,'0' )
        ->where('auditee_id', $id)
        ->orderBy('auditee_show_status', 'desc')
        ->orderBy('auditee_name', 'asc')
        ->first();
        // dd($audite_detail);

        $pejabatAudite = DB::table('auditee_pic')
        ->leftJoin('par_jabatan_pic', 'pic_jabatan_id', '=', 'par_jabatan_pic.jabatan_pic_id')
        ->select('pic_id' , 'pic_nip', 'pic_name', 'jabatan_pic_name', 'pic_email')
        ->where('pic_del_st', '!=', '0')
        ->where('pic_auditee_id', $id)
        ->get();

        $jabatan = DB::table('par_jabatan_pic')
        ->select('jabatan_pic_id', 'jabatan_pic_name')->get();
        return view('master_audite.detail_auditee' ,compact('audite_detail','pejabatAudite', 'id', 'jabatan'));
    }

    public function delete_audite(Request $request,$id){
        $affected = DB::table('auditee')
        ->where('auditee_id', $id)
        ->update(['auditee_del_st'=> 0]);
        Alert::success('Success','Data berhasil di Hapus');
        return redirect('audite');
    }

    public function save_audite(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        DB::table('auditee')->insert
        ([
            'auditee_id' =>$uuid,
            'auditee_kode' =>$request->kode_audit,
            'auditee_name' =>$request->name,
            'auditee_parrent_id' =>$request->eslon_unit,
            'auditee_inspektorat_id' =>$request->inspektorat,
            'auditee_propinsi_id' =>$request->provinsi,
            'auditee_kabupaten_id' =>$request->kabupaten,
            'auditee_alamat' =>$request->alamat,
            'auditee_telp' =>$request->telp,
            'auditee_ext' =>$request->ext,
            'auditee_fax' =>$request->fax,
            'auditee_email' =>$request->email,
            'auditee_show_status' =>$request->status,
            'auditee_del_st' => 1
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('audite');
    }

    public function get_audite(Request $request,$id){
        $getAudite = DB::table('auditee')
        ->select('auditee_id','auditee_kode', 'auditee_name', 'auditee_parrent_id', 'auditee_inspektorat_id', 'auditee_propinsi_id', 'auditee_kabupaten_id', 'auditee_alamat', 'auditee_telp', 'auditee_ext', 'auditee_fax', 'auditee_email', 'auditee_show_status')
        ->where('auditee_del_st', 1)
        ->where('auditee_id', $id)
        ->get();
        // dd($getAudite);

        $eselon = DB::table('par_esselon')
        ->select('esselon_id', 'esselon_name')
        ->where('esselon_del_st', 1)
        ->get();

        $inspektorat = DB::table('par_inspektorat')
        ->select('inspektorat_id', 'inspektorat_name')
        ->where('inspektorat_del_st', 1)->get();
        
        $provinsi = DB::table('par_propinsi')
        ->select('propinsi_id', 'propinsi_name')
        ->where('propinsi_del_st', 1)->get();

        $kabupaten = DB::table('par_kabupaten')
        ->select('kabupaten_id', 'kabupaten_name')
        ->where('kabupaten_del_st', 1)->get();

        return view('master_audite.update_audite', compact('eselon', 'inspektorat', 'provinsi', 'getAudite','kabupaten'));
    }

    public function update_audite(Request $request, $id){
        $affected = DB::table('auditee')
        ->where('auditee_id', $id)
        ->update([
            'auditee_kode' =>$request->kode_audit,
            'auditee_name' =>$request->name,
            'auditee_parrent_id' =>$request->eslon_unit,
            'auditee_inspektorat_id' =>$request->inspektorat,
            'auditee_propinsi_id' =>$request->provinsi,
            'auditee_kabupaten_id' =>$request->kabupaten,
            'auditee_alamat' =>$request->alamat,
            'auditee_telp' =>$request->telp,
            'auditee_ext' =>$request->ext,
            'auditee_fax' =>$request->fax,
            'auditee_email' =>$request->email,
            'auditee_show_status' =>$request->status
            
        ]);
        Alert::success('Success','Data berhasil di Update');
        return redirect('/audite');
    }

    // pejabat audite
    public function detail_pejabat($id){
        $detail_pejabat = DB::table('auditee_pic')
        ->leftJoin('par_jabatan_pic', 'pic_jabatan_id', '=', 'par_jabatan_pic.jabatan_pic_id')
        ->select('pic_id' , 'pic_nip', 'pic_name', 'jabatan_pic_name', 'pic_email', 'pic_telp', 'pic_mobile')
        ->where('pic_del_st', '!=', '0')
        ->where('pic_id', $id)->first();
        // dd($detail_pejabat);
        return view('master_audite.modal_detailPjabat', compact('detail_pejabat'));    
    }

    public function edit_pejabat(Request $request, $id){
        // dd($request->par);
        $parent = $request->par;
        $detail_pejabat = DB::table('auditee_pic')
        ->select('pic_id' , 'pic_nip', 'pic_name', 'pic_email', 'pic_telp', 'pic_mobile', 'pic_jabatan_id')
        ->where('pic_del_st', '!=', '0')
        ->where('pic_id', $id)->first();

        $jabatan = DB::table('par_jabatan_pic')
        ->select('jabatan_pic_id', 'jabatan_pic_name')->get();
        // dd($detail_pejabat);
        return view('master_audite.modal_editPejabat', compact('detail_pejabat','jabatan','parent'));    
    }

    public function update_pejabat(Request $request, $id){
        $affected = DB::table('auditee_pic')
        ->where('pic_id', $id)
        ->update([
            'pic_nip' =>$request->nip,
            'pic_name' =>$request->nama,
            'pic_jabatan_id' =>$request->jabatan,
            'pic_mobile' =>$request->mobile,
            'pic_telp' =>$request->telp,
            'pic_email' =>$request->email
        ]);
        Alert::success('Success','Data berhasil di Update');
        return redirect('/audite/detail_audite/'.$request->parent);
        // return redirect('pegawai');
    }

    public function save_pejabat(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        DB::table('auditee_pic')->insert
        ([
            'pic_id' =>$uuid,
            'pic_nip' =>$request->nip,
            'pic_name' =>$request->nama,
            'pic_jabatan_id' =>$request->jabatan,
            'pic_mobile' =>$request->mobile,
            'pic_telp' =>$request->telp,
            'pic_email' =>$request->email,
            'pic_auditee_id' =>$request->parent,
            'pic_del_st' => 1
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('/audite/detail_audite/'.$request->parent);
        // return redirect('audite');
    }

    public function delete_pejabat(Request $request, $id){
        // dd($request->parent);
        $affected = DB::table('auditee_pic')
        ->where('pic_id', $id)
        ->update(['pic_del_st'=> 0 ]);
        Alert::success('Success','Data berhasil di Hapus');
        return redirect('/audite');
    }
}
