
@extends('sb-admin/app')
@section('title', 'Pegawai')

@section('content')

<section id="main" class="column">
	<article class="module width_3_quarter bangga-card">
		<div id="demopage">
			<div class="container1">
				<ul class="rtabs">
					<li class="selected" data-tab="view1"><a>Rincian Pegawai</a></li>
					<li data-tab="view2"><a>Riwayat Pelatihan</a></li>
					<li data-tab="view3"><a>Riwayat Penugasan</a></li>
					<li data-tab="view4"><a>Riwayat Pendidikan</a></li>
				</ul>
				<div class="panel-container">
					<div id="view1"  class="tab-content selected">
                        @foreach ($detail_auditor as $index=>$ripegawai)
                        <fieldset class="hr">
                            <label class="span2">NIP</label> <span style="padding-left:121px;"> :  {{ $ripegawai->auditor_nip }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Nama</label> <span style="padding-left:105px;"> : {{ $ripegawai->auditor_name }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Tempat, Tgl Lahir</label><span style="padding-left:23px;"> : {{ $ripegawai->auditor_tempat_lahir }}, {{ $ripegawai->auditor_tgl_lahir }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Alamat Rumah</label> <span style="padding-left:40px;"> : {{$ripegawai->auditor_alamat }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Jenis Kelamin</label> <span style="padding-left:51px;"> : {{ $ripegawai->auditor_jenis_kelamin }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Agama</label> <span style="padding-left:97px;"> : {{ $ripegawai->auditor_agama }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Golongan/Pangkat</label><span style="padding-left:15px;"> : {{ $ripegawai->auditor_pangkat }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">TMT</label> <span style="padding-left:117px;"> : {{ $ripegawai->auditor_tmt }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Jabatan</label> <span style="padding-left:95px;"> : {{ $ripegawai->jenis_jabatan_sub }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Golongan Biaya</label><span style="padding-left:36px;"> : {{ $ripegawai->auditor_golongan }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Mobile</label> <span style="padding-left:100px;"> : {{ $ripegawai->auditor_mobile }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Telp</label> <span style="padding-left:118px;"> : {{ $ripegawai->auditor_telp }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Email</label> <span style="padding-left:108px;"> : {{ $ripegawai->auditor_email }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Foto</label> <span style="padding-left:117px;"> : {{ $ripegawai->auditor_email }}</span>
                        </fieldset>
                        @endforeach
						<button type="button" class="btn btn-outline-primary" onclick="">
						<i class="fa fa-print"></i>Print</button>
                        <a href="/pegawai" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
					</div>
					<div id="view2" class="tab-content">
						{{-- <!?php include 'pelatihan_main.php';?>	  --}}
                        <article class="module width_3_quarter ">
                            <header >
                                <h3 class="tabs_involved">Riwayat Pelatihan</h3>
                            </header>
                                <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#pelatihan-modal">
                                    Create
                                </button>
                                <input type="hidden" value="{{$id}}" name="parent">
                            <table class="table table-bordered" cellspacing="0" cellpadding="0">
                                <thead class="thead-dark">
                                    <tr>
                                    <th width='10%'>No</th>
                                    <th width='30%'>Jenis Pelatihan</th>
                                    <th width='30%'>Nama Pelatihan</th>
                                    <th width='30%'>Durasi</th>
                                    <th width='30%'>Penyelengara</th>
                                    <th width='30%'>Aksi</th>
                                    </tr>
                                </thead>
                                @if ($ripelatihan):                                 
                                @foreach ($ripelatihan as $pelatihan)
                                <tr>
                                    <td>{{ $index+1 }}</td> 
                                    <td>{{ $pelatihan->kompetensi_name }}</td> 
                                    <td>{{ $pelatihan->pelatihan_nama }}</td> 
                                    <td>{{ $pelatihan->lengkap }}</td>
                                    <td>{{ $pelatihan->pelatihan_penyelenggara }}</td> 
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" data-toggle="modal" data-target="#pelatihan-modal-edit" data-id="{{$pelatihan->pelatihan_id}}" data-parent="{{$id}}"><i class="fas fa-pencil-alt"></i></button>

                                        <a href="{{route('pegawai.delete_pelatihan',$pelatihan->pelatihan_id)}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i>
                                    </td>  
                                </tr>
                                @endforeach
                                @else:
                                <tr>
                                    <td colspan="6">Tidak Ada Data</td> 
                                </tr>  
                                @endif
                            </table>
                            <a href="/pegawai" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
                        </article>
                        {{-- modal create --}}
                        <!-- Modal Pelatihan-->
                        <div class="modal fade" id="pelatihan-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="pelatihan-modal">Tambah Pelatihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('pegawai.save_pelatihan')}}" class="form-horizontal" id="needs-validation2" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" value="{{$id}}" name="parent">
                                            <input type="text" value="{{$id}}" name="auditor_id">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis Pelatihan</label>
                                            <select class="custom-select mr-sm-2" id="kompetensi" name="kompetensi" required>
                                                <option value="">Pilih Satu</option>
                                                @foreach ($kompetensi as $kompeten)
                                                <option value="{{$kompeten->kompetensi_id}}">{{$kompeten->kompetensi_name}}</option>
                                                @endforeach                                   
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih salah satu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelatihan</label>
                                            <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" placeholder="Nama Pelatihan" required>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pelatihan
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Durasi (jam)</label>
                                          <input type="text" class="form-control" id="durasi" name="durasi" placeholder="Enter Durasi" required>
                                            <div class="invalid-feedback">
                                            Masukkan Durasi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tanggal</label>
                                            <div class="row">
                                                <div class="col">
                                                  <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai" required>
                                                    <div class="invalid-feedback">
                                                        Masukkan Tanggal Awal
                                                    </div>
                                                </div>
                                                <div class="col">
                                                  <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir" required>
                                                    <div class="invalid-feedback" >
                                                        Masukkan Tanggal Akhir
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Penyelenggara</label>
                                            <input type="text" class="form-control" id="penyelenggara" placeholder="Enter Penyelenggara" name="penyelenggara" required>
                                            <div class="invalid-feedback" >
                                                Masukkan Tanggal Penyelenggara
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Unggah Sertifikat</label>
                                            <input type="file" class="form-control-file" id="sertifikat" name="sertifikat" required>
                                            <div class="invalid-feedback" >
                                                Masukkan File
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="modal fade" id="pelatihan-modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="pelatihan-modal2">Update Pelatihan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                  
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- akhir modal pelatihan  --}}
					</div>


					<div id="view3" class="tab-content">
						<article class="module width_3_quarter ">
						<header >
							<h3 class="tabs_involved"></h3>
						</header>
						<table class="table table-bordered" cellspacing="0" cellpadding="0">
                            <thead class="thead-dark">
                                <tr>
                                <th width='10%'>No</th>
                                <th width='30%'>No Surat Tugas</th>
                                <th width='30%'>Satuan Kerja</th>
                                <th width='30%'>Posisi Penugasan</th>
                                </tr>
                            </thead>
                            @if ($ripenugasan):
                                
                            @foreach ($ripenugasan as $index=>$tugas)
                            <tr>
                                <td>{{ $index+1 }}</td> 
                                <td>{{ $tugas->assign_surat_no }}</td> 
                                <td>{{ $tugas->auditee_name }}</td> 
                                <td>{{ $tugas->posisi_name }}</td> 
                            </tr>
                            @endforeach
                            @else:
                            <tr>
                                <td colspan="5">Tidak Ada Data</td> 
                            </tr>  
                            @endif
						</table>
                        <a href="/pegawai" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
						</article>
					</div>
					<div id="view4" class="tab-content">
						<article class="module width_3_quarter ">
                            <header >
                                <h3 class="tabs_involved"></h3>
                            </header>
                            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#pendidikan-modal">
                                Create
                            </button>
                            <table class="table table-bordered" cellspacing="0" cellpadding="0">
                                <thead class="thead-dark">
                                    <tr>
                                    <th>No</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Kota</th>
                                    <th>Negara</th>
                                    <th>Tahun</th>
                                    <th>Jurusan</th>
                                    <th>Kota</th>
                                    <th>IPK</th>
                                    <th>Aksi</th>
                                    
                                    </tr>
                                </thead>
                                @if ($ripendidikan):                                
                                @foreach ($ripendidikan as $index=>$pendidikan)
                                <tr>
                                    <td>{{ $index+1}}</td> 
                                    <td>{{ $pendidikan->pendidikan_tingkat }}</td> 
                                    <td>{{ $pendidikan->pendidikan_instuisi }}</td> 
                                    <td>{{ $pendidikan->pendidikan_kota }}</td> 
                                    <td>{{ $pendidikan->pendidikan_negara }}</td> 
                                    <td>{{ $pendidikan->pendidikan_tahun }}</td> 
                                    <td>{{ $pendidikan->pendidikan_jurusan }}</td> 
                                    <td>{{ $pendidikan->pendidikan_nilai }}</td>
                                    <td>


                                        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" data-toggle="modal" data-target="#pendidikan-modal-edit" data-id="{{$pendidikan->pendidikan_id}}" data-parent="{{$id}}"><i class="fas fa-pencil-alt"></i></button>


                                        <a href="{{route('pegawai.delete_pendidikan',$pendidikan->pendidikan_id)}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
                                    </td> 
                                </tr>
                                @endforeach
                                @else:
                                <tr>
                                    <td colspan="8">Tidak Ada Data</td> 
                                </tr>  
                                @endif
                            </table>
                            <a href="/pegawai" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
                            </article>

                        <!-- Modal pendidikan create-->
                        <div class="modal fade" id="pendidikan-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="pendidikan-modal">Tambah Pendidikan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('pegawai.save_pendidikan')}}" class="needs-validation" id="validation-form" novalidate>
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$id}}" name="parent">
                                        <input type="hidden" value="{{$id}}" name="auditor_id">
                                        <div class="form-group">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Tingkat Pendidikan</label>
                                            <select class="custom-select mr-sm-2" id="pendidikan" name="pendidikan" required>
                                                <option value="">Pilih Satu</option>
                                                <option value="sma">SMA</option>
                                                <option value="d3">D3</option>
                                                <option value="s1">S1</option>
                                                <option value="s2">S2</option>
                                                <option value="s3">S3</option>                         
                                            </select>
                                            <div class="invalid-feedback">
                                               Pilih salah satu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Institusi</label>
                                            <input type="text" class="form-control" id="institusi" name="institusi" placeholder="Nama Institusi" required>
                                            <div class="invalid-feedback">
                                                Masukan Nama Institusi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Kota</label>
                                          <input type="text" class="form-control" id="kota" name="kota" placeholder="Enter Kota" required>
                                          <div class="invalid-feedback">
                                            Masukan Kota.
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Negara</label>
                                            <input type="text" class="form-control" name="negara" id="negara" placeholder="Tanggal Mulai" required>                                        <div class="invalid-feedback">
                                                Masukkan Negara.
                                            </div>  
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" placeholder="Enter Tahun" name="tahun" required>
                                            <div class="invalid-feedback">
                                                Masukkan Tahun.
                                            </div>  
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Jurusan</label>
                                            <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                                            <div class="invalid-feedback">
                                                Masukkan Jurusan.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Nilai / IPK</label>
                                            <input type="text" class="form-control" id="nilai" name="nilai" required>
                                            <div class="invalid-feedback">
                                                Masukkan Nilai.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                    </div>
                            </div>
                            </div>
                        </div>

                            <!-- Modal pendidikan edit-->
                            <div class="modal fade" id="pendidikan-modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="pendidikan-modal-edit3">Update Pendidikan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- akhir modal pendidikan  --}}
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

@endsection

@push('js')
    
<script>
    $("#tgl_mulai, #tgl_akhir").flatpickr();
    $("#tgl_mulai_edit, #tgl_akhir_edit").flatpickr();

// pendidikan
    $('#pendidikan-modal-edit').on('show.bs.modal', function (e) {
        
        var id= $(e.relatedTarget).attr('data-id')
        var id_par= $(e.relatedTarget).attr('data-parent')
        console.log(id_par);
          $.ajax({
                type : "GET",
                url: "{{URL::to('pegawai/edit_pendidikan')}}/"+ id,
                data:{id : id , par: id_par },
                dataType : "text",

                success: function(data){
                    console.log(data);
                    $("#pendidikan-modal-edit").find('.modal-body').append(data);
                    Validasi_editPendidikan();
                    // refres();
                }
        });
    });


    $('#pendidikan-modal-edit').on('hidden.bs.modal', function (e) {
        var id= $(e.relatedTarget).attr('data-id')
        $("#pendidikan-modal-edit").find('.modal-body').empty();
          
    });

// validation tambah pendidikan
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function Validasi_editPendidikan(){
    // alert('cek alert');
    $("#validation-form_cek").validate({
		rules: {
			institusi: "required",
			kota: "required",
			negara: "required",
			tahun: "required",
			jurusan: "required",
			nilai: "required"
		},
		messages: {
			institusi: "Masukan Institusi",
			kota: "Masukan Kota",
			negara: "Masukan Negara",
			tahun: "Masukan Tahun",
			jurusan: "Masukan Jurusan",
			nilai: "Masukkan Nilai"
		},		
		submitHandler: function(form) {
			form.submit();           
		}
	});
}
// akhir pendidikan



// pelatihan

    $('#pelatihan-modal-edit').on('show.bs.modal', function (e) {
        var id= $(e.relatedTarget).attr('data-id')
        var id_par= $(e.relatedTarget).attr('data-parent')
        console.log(id_par);
          $.ajax({
                type : "GET",
                url: "{{URL::to('pegawai/edit_pelatihan')}}/"+ id,
                data:{id : id , par: id_par },
                dataType : "text",

                success: function(data){
                    $("#pelatihan-modal-edit").find('.modal-body').append(data);
                    validation_pelatihanEdit();
                }
        });
    });


    $('#pelatihan-modal-edit').on('hidden.bs.modal', function (e) {
        var id= $(e.relatedTarget).attr('data-id')
        $("#pelatihan-modal-edit").find('.modal-body').empty();
          
    });

// validation create pelatihan
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation2');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// validation Edit pelatihan
function validation_pelatihanEdit(){
$("#validation-form_editPlatihan").validate({
    rules: {
        nama_pelatihan: "required",
        durasi: "required",
        tgl_mulai_edit: "required",
        tgl_akhir_edit: "required",
        penyelenggara: "required"
        
    },
    messages: {
        nama_pelatihan: "Masukan Nama Pelatihan",
        durasi: "Masukan Durasi",
        tgl_mulai_edit: "Masukan Tanggal Mulai",
        tgl_akhir_edit: "Masukan Tanggal Akhir",
        penyelenggara: "Masukan Nama Penyelenggara"
        
    },		
    submitHandler: function(form) {
        form.submit();
    }
});
}
</script>
@endpush