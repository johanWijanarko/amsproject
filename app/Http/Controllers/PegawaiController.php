<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
// pegawai
    public function index(){
		$auditor = DB::table('auditor')
        ->leftJoin('par_pangkat_auditor', 'auditor_id_pangkat', '=', 'par_pangkat_auditor.pangkat_id')
        ->leftJoin('par_jenis_jabatan', 'auditor_id_jabatan', '=', 'par_jenis_jabatan.jenis_jabatan_id')
        ->select('auditor_id','auditor_nip', 'auditor_name','jenis_jabatan_sub',  DB::raw("CONCAT(par_pangkat_auditor.pangkat_name,'-',par_pangkat_auditor.pangkat_desc) as auditor_golongan"),'jenis_jabatan_sub')
        ->where('auditor_del_st', '!=' ,'0' )
        ->orderByDesc('pangkat_name')
        ->paginate(10);
        return view('master_pegawai.index',compact('auditor'));
    }

    public function cari(Request $request){
        $cari = $request->cari;
 
    	// mengambil data dari table pegawai sesuai pencarian data
		$auditor = DB::table('auditor')
        ->leftJoin('par_pangkat_auditor', 'auditor_id_pangkat', '=', 'par_pangkat_auditor.pangkat_id')
        ->leftJoin('par_jenis_jabatan', 'auditor_id_jabatan', '=', 'par_jenis_jabatan.jenis_jabatan_id')
        ->select('auditor_id','auditor_nip', 'auditor_name','jenis_jabatan_sub',  DB::raw("CONCAT(par_pangkat_auditor.pangkat_name,'-',par_pangkat_auditor.pangkat_desc) as auditor_golongan"),'jenis_jabatan_sub')
        ->where('auditor_del_st', '!=' ,'0' )
        ->where('auditor_name','like',"%".$cari."%")
        ->orderByDesc('pangkat_name')
        ->paginate(10);
        return view('master_pegawai.index',compact('auditor'));
    }

    public function detail($id){
        $detail_auditor= DB::table('auditor')
            ->leftjoin('par_pangkat_auditor', 'auditor_id_pangkat', '=', 'pangkat_id')
            ->leftjoin('par_jenis_jabatan', 'auditor_id_jabatan', '=', 'jenis_jabatan_id')
            ->select('auditor_id', 'auditor_unit_inspektorat', 'auditor_nip', 'auditor_name', 'auditor_tempat_lahir', 'auditor_tgl_lahir', 'auditor_golongan', 'auditor_mobile', 'auditor_telp', 'auditor_email', DB::raw("CONCAT(pangkat_name,'-', pangkat_desc) as auditor_pangkat"), 'auditor_id_pangkat', 'auditor_id_jabatan', 'jenis_jabatan', 'jenis_jabatan_sub', 'auditor_alamat', 'auditor_jenis_kelamin', 'auditor_agama', 'auditor_foto', 'auditor_tmt')
            ->where('auditor_id', '=', $id)
            ->get();

            $ripenugasan= DB::table('assignment_auditor')->distinct()
            ->leftjoin('assignment_surat_tugas', 'assign_auditor_id_assign', '=', 'assign_surat_id_assign')
            ->leftjoin('auditee', 'assign_auditor_id_auditee', '=', 'auditee_id')
            ->leftjoin('par_posisi_penugasan', 'assign_auditor_id_posisi', '=', 'posisi_id')
            ->select('assign_auditor_id_assign', 'assign_surat_no', 'auditee_name', 'posisi_name')
            ->where('assign_auditor_id_auditor', '=', $id)
            ->get();

            $ripelatihan= DB::table('auditor_pelatihan')
            ->leftjoin('par_kompetensi', 'pelatihan_kompetensi_id', '=', 'kompetensi_id')
            ->select('pelatihan_id','kompetensi_name','pelatihan_nama', DB::raw("CONCAT(pelatihan_durasi,' jam') as lengkap"),'pelatihan_penyelenggara', 'pelatihan_tanggal_akhir')
            ->where('pelatihan_auditor_id', '=', $id)
            ->get();
           
            $ripendidikan= DB::table('auditor_pendidikan')
            ->select('pendidikan_id', 'pendidikan_tingkat', 'pendidikan_instuisi', 'pendidikan_kota', 'pendidikan_negara', 'pendidikan_tahun', 'pendidikan_jurusan', 'pendidikan_nilai')
            ->where('pendidikan_auditor_id', $id)
            ->get();

            $kompetensi= DB::table('par_kompetensi')
            ->select('kompetensi_id', 'kompetensi_name')
            ->where('kompetensi_del_st', 1)
            ->get();
            
            // dd($ripendidikan);
            return view('master_pegawai.detail',compact('detail_auditor','ripenugasan', 'ripelatihan', 'ripendidikan', 'kompetensi','id'));
    }

    public function tambah_pegawai(){
        $insprktorat = DB::table('par_inspektorat')
        ->select('inspektorat_id', 'inspektorat_name')
        ->where('inspektorat_del_st', 1)
        ->get();

        $pangkat = DB::table('par_pangkat_auditor')
        ->select('pangkat_id', DB::raw("CONCAT(pangkat_name,'-', pangkat_desc) as auditor_pangkat"))
        ->where('pangkat_del_st', 1)
        ->orderBy('pangkat_name', 'asc')
        ->get();

        $jabatan = DB::table('par_jenis_jabatan')
        ->select('jenis_jabatan_id',  DB::raw("CONCAT(jenis_jabatan,'-', jenis_jabatan_sub) as auditor_jabatan"))
        ->where('jenis_jabatan_del_st', 1)
        ->orderBy('jenis_jabatan_sort', 'asc')
        ->get();
        return view('master_pegawai.tambah', compact('insprktorat', 'pangkat', 'jabatan'));
    }

    public function save_pegawai(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
       
        $path = $request->file('foto')->store('upload');

        DB::table('auditor')->insert
        ([
            'auditor_id' =>$uuid,
            'auditor_nip' =>$request->nip,
            'auditor_name' =>$request->name,
            'auditor_tempat_lahir' =>$request->tempat_lahir,
            'auditor_tgl_lahir' =>$request->tanggal_lahir,
            'auditor_alamat' =>$request->alamat,
            'auditor_jenis_kelamin' =>$request->kelamin,
            'auditor_agama' =>$request->agama,
            'auditor_unit_inspektorat' =>$request->inspektorat,
            'auditor_id_pangkat' =>$request->pangkat,
            'auditor_tmt' =>$request->tmt,
            'auditor_id_jabatan' =>$request->jabatan,
            'auditor_mobile' =>$request->mobile,
            'auditor_telp' =>$request->telp,
            'auditor_email' =>$request->email_auditor,
            'auditor_foto' =>$path,
            'auditor_del_st' => 1
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('pegawai');
    }

    public function deletePegawai($id){
        DB::table('auditor')->where('auditor_id', $id)->delete();
        Alert::success('Success','Data berhasil di Dihapus');
        return redirect('pegawai');
    }

    public function getEdit($id){
        // var_dump($id); die();
        $detail_auditor= DB::table('auditor')
            ->select('auditor_id','auditor_agama','auditor_nip','auditor_name','auditor_tempat_lahir','auditor_tgl_lahir', 'auditor_alamat', 'auditor_jenis_kelamin','auditor_unit_inspektorat','auditor_id_pangkat', 'auditor_tmt', 'auditor_id_jabatan', 'auditor_mobile', 'auditor_telp', 'auditor_email', 'auditor_foto')
            ->where('auditor_id', '=', $id)
            ->get();

            $insprktorat = DB::table('par_inspektorat')
            ->select('inspektorat_id', 'inspektorat_name')
            ->where('inspektorat_del_st', 1)
            ->get();

            $pangkat = DB::table('par_pangkat_auditor')
            ->select('pangkat_id', DB::raw("CONCAT(pangkat_name,'-', pangkat_desc) as auditor_pangkat"))
            ->where('pangkat_del_st', 1)
            ->orderBy('pangkat_name', 'asc')
            ->get();

            $jabatan = DB::table('par_jenis_jabatan')
            ->select('jenis_jabatan_id',  DB::raw("CONCAT(jenis_jabatan,'-', jenis_jabatan_sub) as auditor_jabatan"))
            ->where('jenis_jabatan_del_st', 1)
            ->orderBy('jenis_jabatan_sort', 'asc')
            ->get();

            return view('master_pegawai.edit_pegawai', compact('detail_auditor','insprktorat','pangkat', 'jabatan'));
    }

    public function updatePegawai(Request $request, $id){
        // var_dump($id); die();
        $path = $request->file('foto');
        $update_file = [
            'auditor_nip' =>$request->nip,
            'auditor_name' =>$request->name,
            'auditor_tempat_lahir' =>$request->tempat_lahir,
            'auditor_tgl_lahir' =>$request->tanggal_lahir,
            'auditor_alamat' =>$request->alamat,
            'auditor_jenis_kelamin' =>$request->kelamin,
            'auditor_agama' =>$request->agama,
            'auditor_unit_inspektorat' =>$request->inspektorat,
            'auditor_id_pangkat' =>$request->pangkat,
            'auditor_tmt' =>$request->tmt,
            'auditor_id_jabatan' =>$request->jabatan,
            'auditor_mobile' =>$request->mobile,
            'auditor_telp' =>$request->telp,
            'auditor_email' =>$request->email_auditor

        ];
        if($path != null){
            $path = $path->store('public/upload/');
            $update_file['auditor_foto'] = $path;
        }
        // dd();

        $affected = DB::table('auditor')
        ->where('auditor_id', $id)
        ->update($update_file);
        Alert::success('Success','Data berhasil di Update');
        return redirect('pegawai');
    }



// peletihan
    public function save_pelatihan(Request $request){
        // dd($request);
        $tglmulai = $request->tgl_mulai;
        $tglmulai =str_replace('-', '', $tglmulai);
        $tglakhir = $request->tgl_akhir;
        $tglakhir =str_replace('-', '', $tglakhir);
        // dd($tglmulai);
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        $path = $request->file('sertifikat')->store('upload');
        DB::table('auditor_pelatihan')->insert([
            'pelatihan_id' =>$uuid,
            'pelatihan_auditor_id' =>$request->auditor_id,
            'pelatihan_kompetensi_id' =>$request->kompetensi,
            'pelatihan_nama' =>$request->nama_pelatihan,
            'pelatihan_durasi' =>$request->durasi,
            'pelatihan_tanggal_awal' =>$tglmulai,
            'pelatihan_tanggal_akhir' =>$tglakhir,
            'pelatihan_penyelenggara' =>$request->penyelenggara,
            'pelatihan_sertifikat' =>$path
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('/pegawai/detail/'.$request->parent);
    }

    public function delete_pelatihan($id){
        DB::table('auditor_pelatihan')->where('pelatihan_id', $id)->delete();
        Alert::success('Success','Data berhasil di Dihapus');
        return redirect('pegawai');
    }

    public function edit_pelatihan(Request $request, $id){
        $parent = $request->par;
        $edit_pelatihan = DB::table('auditor_pelatihan')->where('pelatihan_id', $id)->first();

        $kompetensi= DB::table('par_kompetensi')
        ->select('kompetensi_id', 'kompetensi_name')
        ->where('kompetensi_del_st', 1)
        ->get();

        return view('master_pegawai.edit_pelatihan_modal', compact('edit_pelatihan','kompetensi', 'parent'));
    }

    public function update_pelatihan(Request $request, $id){
        $path = $request->file('sertifikat');
        $update_file = [
            'pelatihan_kompetensi_id' =>$request->kompetensi,
            'pelatihan_nama' =>$request->nama_pelatihan,
            'pelatihan_durasi' =>$request->durasi,
            'pelatihan_tanggal_awal' =>$request->tgl_mulai_edit,
            'pelatihan_tanggal_akhir' =>$request->tgl_akhir_edit,
            'pelatihan_penyelenggara' =>$request->penyelenggara,
        ];
        if($path != null){
            $path = $path->store('public/upload/');
            $update_file['pelatihan_sertifikat'] = $path;
        }
        // dd();

        $affected = DB::table('auditor_pelatihan')
        ->where('pelatihan_id', $id)
        ->update($update_file);
        Alert::success('Success','Data berhasil di Update');
        return redirect('/pegawai/detail/'.$request->parent);
    }


//pendidikan
    public function save_pendidikan(Request $request){
        $uuid = \Str::uuid();
        $uuid = str_replace('-', '', $uuid);
        $uuid = strval($uuid);
        // $path = $request->file('sertifikat')->store('upload');
        DB::table('auditor_pendidikan')->insert([
            'pendidikan_id' =>$uuid,
            'pendidikan_auditor_id' =>$request->auditor_id,
            'pendidikan_tingkat' =>$request->pendidikan,
            'pendidikan_instuisi' =>$request->institusi,
            'pendidikan_kota' =>$request->kota,
            'pendidikan_negara' =>$request->negara,
            'pendidikan_tahun' =>$request->tahun,
            'pendidikan_jurusan' =>$request->jurusan,
            'pendidikan_nilai' =>$request->nilai
        ]);
        Alert::success('Success','Data berhasil di simpan');
        return redirect('/pegawai/detail/'.$request->parent);
    }

    public function delete_pendidikan($id){
        DB::table('auditor_pendidikan')->where('pendidikan_id', $id)->delete();
        Alert::success('Success','Data berhasil di Dihapus');
        return redirect('pegawai');
    }

    public function edit_pendidikan(Request $request, $id){
        $parent = $request->par;
        $editpendidikan = DB::table('auditor_pendidikan')->where('pendidikan_id', $id)->first();
        return view('master_pegawai.edit_pendidikan_modl', compact('editpendidikan', 'parent'));
       
    }

    public function update_pendidikan(Request $request, $id){
        
        $affected = DB::table('auditor_pendidikan')
        ->where('pendidikan_id', $id)
        ->update([
            'pendidikan_tingkat' =>$request->pendidikan,
            'pendidikan_instuisi' =>$request->institusi,
            'pendidikan_kota' =>$request->kota,
            'pendidikan_negara' =>$request->negara,
            'pendidikan_tahun' =>$request->tahun,
            'pendidikan_jurusan' =>$request->jurusan,
            'pendidikan_nilai' =>$request->nilai
        ]);
        Alert::success('Success','Data berhasil di Update');
        return redirect('/pegawai/detail/'.$request->parent);
    }
}
