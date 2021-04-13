
@extends('sb-admin/app')
@section('title', 'Audite')

@section('content')

<section id="main" class="column">
	<article class="module width_3_quarter bangga-card">
		<div id="demopage">
			<div class="container1">
				<ul class="rtabs">
					<li class="selected" data-tab="view1"><a>Rincian Audite</a></li>
					<li data-tab="view2"><a>Pejabat Audite</a></li>
				</ul>
				<div class="panel-container">
                    {{-- <input --}}
					<div id="view1"  class="tab-content selected">
                       
                        <fieldset class="hr">
                            <label class="span2">Kode Auditee </label> <span style="padding-left:130px;"> : {{ $audite_detail->auditee_kode }} </span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Nama Auditee</label> <span style="padding-left:125px;"> : {{ $audite_detail->auditee_name }} </span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Unit Eselon 1</label><span style="padding-left:133px;"> : {{ $audite_detail->esselon_name }} </span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Inspektorat Penanggung Jawab</label> <span style="padding-left:5px;"> : {{ $audite_detail->inspektorat_name }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Propinsi</label> <span style="padding-left:172px;"> : {{ $audite_detail->propinsi_name }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Kabupaten</label> <span style="padding-left:152px;"> : {{ $audite_detail->kabupaten_name }} </span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Alamat</label>
                            <span style="padding-left:178px;"> :{{ $audite_detail->auditee_alamat }} </span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Telp</label> <span style="padding-left:200px;"> : {{ $audite_detail->auditee_telp }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Ext</label> <span style="padding-left:208px;"> : {{ $audite_detail->auditee_ext }}</span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Email</label><span style="padding-left:192px;"> : {{ $audite_detail->auditee_email }} </span>
                        </fieldset>
                        <fieldset class="hr">
                            <label class="span2">Fax</label> <span style="padding-left:207px;"> : {{ $audite_detail->auditee_fax }} </span>
                        </fieldset>
						<button type="button" class="btn btn-outline-primary" onclick="">
						<i class="fa fa-print"></i>Print</button>
                        <a href="/audite" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
					</div>
					<div id="view2" class="tab-content">
						{{-- <!?php include 'pelatihan_main.php';?>	  --}}
                        <article class="module width_3_quarter ">
                            <header >
                                <h4 class="tabs_involved">Riwayat Pejabat Audite</h4>
                            </header><br>
                                <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#pelatihan-modal">
                                    Create
                                </button>
                                <input type="hidden" value="{{$id}}" name="parent">
                            <table class="table table-bordered" cellspacing="0" cellpadding="0">
                                <thead class="thead-dark">
                                    <tr>
                                    <th width='10%'>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th style="width:130px;">Aksi</th>
                                    </tr>
                                </thead>
                                @if ($pejabatAudite):                                
                                @foreach ($pejabatAudite as $index=>$pejabatAudites)
                                <tr>
                                    <td>{{$index+1}}</td> 
                                    <td>{{$pejabatAudites->pic_nip}}</td> 
                                    <td>{{$pejabatAudites->pic_name}}</td> 
                                    <td>{{$pejabatAudites->jabatan_pic_name}}</td>
                                    <td>{{$pejabatAudites->pic_email}}</td> 
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" data-toggle="modal" title="Detail" data-target="#pejabat-modal-detail" data-id="{{$pejabatAudites->pic_id}}"><i class="fas fa-info-circle"></i></button>
                                        
                                        <button type="button" class="btn btn-sm btn-outline-success rounded-circle" data-toggle="modal" title="Edit" data-target="#pejabat-modal-edit" data-id="{{$pejabatAudites->pic_id}}" data-parent="{{$id}}"><i class="fas fa-pencil-alt"></i></button>

                                        <a href="{{route('audite.delete_pejabat',$pejabatAudites->pic_id, $id)}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
                                    </td>  
                                </tr>
                                @endforeach
                                @else:
                                <tr>
                                    <td colspan="6">Tidak Ada Data</td> 
                                </tr>  
                                @endif
                            </table>
                            <a href="/audite" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
                        </article>
                        
                        <!-- Modal jabatan create-->
                        <div class="modal fade" id="pelatihan-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="pelatihan-modal">Tambah Pejabat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('audite.save_pejabat')}}" class="form-horizontal" id="needs-validation2" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" value="{{$id}}" name="parent">
                                            <label for="exampleInputEmail1">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Nama NIP" required>
                                            <div class="invalid-feedback">
                                                Masukkan NIP
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Nama</label>
                                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" required>
                                            <div class="invalid-feedback">
                                            Masukkan Nama
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Jabatan</label>
                                            <select class="custom-select mr-sm-2" id="jabatan" name="jabatan">
                                                <option value="">Pilih Jabatan</option>
                                                @foreach ($jabatan as $jabatan)
                                                    <option value="{{$jabatan->jabatan_pic_id}}" >{{$jabatan->jabatan_pic_name}}</option>
                                                @endforeach 
                                            </select>
                                          </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" placeholder="Enter Penyelenggara" name="mobile" required>
                                            <div class="invalid-feedback" >
                                                Masukkan Mobile
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telp</label>
                                            <input type="text" class="form-control" id="telp" placeholder="Enter Telp" name="telp" required>
                                            <div class="invalid-feedback" >
                                                Masukkan Telp
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                                            <div class="invalid-feedback" >
                                                Masukkan Email
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
                        <!-- Modal jabatan detail-->
                        <div class="modal fade" id="pejabat-modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="pelatihan-modal2">Detail Pejabat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                  {{-- panggil modal body detail --}}
                                </div>
                            </div>
                            </div>
                        </div>
                         <!-- Modal jabatan edit-->
                         <div class="modal fade" id="pejabat-modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="pelatihan-modal2">Update Pejabat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                  {{-- panggil modal body detail --}}
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- akhir modal jabatan  --}}
					</div>
				</div>
			</div>
		</div>
	</article>
</section>

@endsection

@push('js')
    
<script>
// pejabat detail
$('#pejabat-modal-detail').on('show.bs.modal', function (e) {
    var id= $(e.relatedTarget).attr('data-id')
    console.log(id);
        $.ajax({
            type : "GET",
            url: "{{URL::to('audite/detail_pejabat')}}/"+ id,
            data:{id : id },
            dataType : "text",

            success: function(data){
                console.log(data);
                $("#pejabat-modal-detail").find('.modal-body').append(data);
                // validation_pelatihanEdit();
            }
    });
});
$('#pejabat-modal-detail').on('hidden.bs.modal', function (e) {
    var id= $(e.relatedTarget).attr('data-id')
    $("#pejabat-modal-detail").find('.modal-body').empty();      
});

// pejabat edit
$('#pejabat-modal-edit').on('show.bs.modal', function (e) {
    var id= $(e.relatedTarget).attr('data-id')
    var id_par= $(e.relatedTarget).attr('data-parent')
    // console.log(id);
        $.ajax({
            type : "GET",
            url: "{{URL::to('audite/edit_pejabat')}}/"+ id,
            data:{id : id , par: id_par },
            dataType : "text",

            success: function(data){
                // console.log(data);
                $("#pejabat-modal-edit").find('.modal-body').append(data);
                validation_pejabatEdit();
            }
    });
});
$('#pejabat-modal-edit').on('hidden.bs.modal', function (e) {
    var id= $(e.relatedTarget).attr('data-id')
    $("#pejabat-modal-edit").find('.modal-body').empty();      
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
function validation_pejabatEdit(){
$("#validation-form_pejabat").validate({
    rules: {
        nip: "required",
        nama: "required",
        jabatan: "required",
        mobile: "required",
        telp: "required",
        email: "required"
        
    },
    messages: {
        nip: "Masukan Nip",
        nama: "Masukan Nama",
        jabatan: "Masukan Jabatan",
        mobile: "Masukan Mobile",
        telp: "Masukan Telp",
        email: "Masukan Email"
        
    },		
    submitHandler: function(form) {
        form.submit();
    }
});
}
</script>
@endpush