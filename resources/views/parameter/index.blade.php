@extends('sb-admin/app')
@section('title', 'Refrensi Audite')


@section('content')
<div class="col-md-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">PARAMETER PENGAWASAN</h3>
            <div class="row">
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" aria-labelledby="headingUtilities" href="/paraminspektorat" ><i class="fa fa-bookmark"></i> Parameter Inspektorat</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block"><i class="fa fa-bookmark"></i> Tipe Audit</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Sub Tipe Audit</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Kelompok Temuan</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Sub Kelompok Temuan</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Jenis Temuan</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Kelompok Rekomendasi</a>
                </div>
                
                <!-- KODE PENYEBAB -->
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Kode Penyebab</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Sub Kode Penyebab</a>
                </div>
                <!-- <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" Onclick="window.open('main_page.php?method=par_kode_penyebab_sub_sub', '_self');"><i class="fa fa-bookmark"></i> Sub Sub Kode Penyebab</a>
                </div> -->
                <!-- END KODE PENYEBAB -->
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Status Tidak Lanjut</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Aspek Program Audit</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Aspek Temuan Audit</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" ><i class="fa fa-bookmark"></i> Kategori Referensi Audit</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" value="Hari Libur" ><i class="fa fa-bookmark"></i> Hari Libur</a>
                </div>
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" value="Gambar Slid" ><i class="fa fa-bookmark"></i> Gambar Slide</a>
                </div> 
                <div class="col-md-3 mb-2">
                   <a  class="btn btn-primary btn-sm btn-block" value="Gambar Slid" ><i class="fa fa-bookmark"></i> Mapping Kode Temuan</a>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection