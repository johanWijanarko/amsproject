@extends('sb-admin/app')
@section('title', 'Audite')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Update Audite</h4>
			@foreach ($getAudite as $auditee)
			<form method="post" action="{{route('audite.update_audite', $auditee->auditee_id)}}" class="needs-validation-pegawai" id="validation-form" enctype="multipart/form-data">
			{{ csrf_field() }}
					
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Kode Auditee</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="kode_audit" id="kode_audit" class="form-control" value="{{ $auditee->auditee_kode }}" readonly>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nama Auditee</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="name" id="name" value="{{ $auditee->auditee_name }}" class="form-control" placeholder="masukan Nama" required>
						<span class="mandatory">*</span>
						<div class="invalid-feedback">
							Masukkan Nama
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Unit Eselon 1</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" id="eslon_unit" name="eslon_unit" required>
							<option value="">Choose...</option>
							@foreach ($eselon as $eselon)
								<option {{ ($auditee->auditee_parrent_id == $eselon->esselon_id ) ? 'selected' : ''}}  value="{{$eselon->esselon_id}}" >{{$eselon->esselon_name}}</option>
							@endforeach 
						</select>
						<div class="invalid-feedback">
							Masukkan Unit Eselon 1
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Inspektorat Penanggung Jawab</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="inspektorat" id="inspektorat" required>
							<option value="">Choose...</option>
							@foreach ($inspektorat as $inspektorat)
								<option {{ ($auditee->auditee_inspektorat_id == $inspektorat->inspektorat_id ) ? 'selected' : ''}}  value="{{ $inspektorat->inspektorat_id }}" >{{ $inspektorat->inspektorat_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Inspektorat
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Provinsi</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="provinsi" id="provinsi" required>
							<option value="">Pilih Provinsi</option>
							@foreach ($provinsi as $provinsi)
								<option {{ ($auditee->auditee_propinsi_id == $provinsi->propinsi_id ) ? 'selected' : ''}}  value="{{ $provinsi->propinsi_id }}" >{{ $provinsi->propinsi_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Provinsi
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Kabupaten/Kota</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="kabupaten" id="kabupaten" required>
							<option value="">Pilih Kabupaten</option>
							@foreach ($kabupaten as $kabupaten)
								<option {{ ($auditee->auditee_kabupaten_id == $kabupaten->kabupaten_id  ) ? 'selected' : ''}}  value="{{ $kabupaten->kabupaten_id  }}" >{{ $kabupaten->kabupaten_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Kabupaten
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Alamat</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="alamat" id="alamat" value="{{ $auditee->auditee_alamat }}" class="form-control" placeholder="masukan alamat" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Alamat
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Telp</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="telp" id="telp" value="{{ $auditee->auditee_telp }}" class="form-control" placeholder="masukan Telp" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Telp
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Ext</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="ext" id="ext" value="{{ $auditee->auditee_ext }}" class="form-control" placeholder="masukan Ext" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Ext
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Fax</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="fax" id="fax" value="{{ $auditee->auditee_fax }}" class="form-control" placeholder="masukan Fax" required>
						<span class="mandatory">*</span>
					</div>
					<div class="invalid-feedback">
						Masukkan Fax
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Email</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="email" id="email" value="{{ $auditee->auditee_email }}" class="form-control" placeholder="masukan Email" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Email
					</div>
				</div>
                <div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label"> Status </label>
					</div>
					<div class="col-md-8">
						<select class="form-control" id="status" name="status" required>
							<option value="">Choose...</option>
							<option value="1" {{($auditee->auditee_show_status == '1' )? 'selected' : ''}}>Show</option>
							<option value="0" {{($auditee->auditee_show_status == '0' )? 'selected' : ''}}>Hide</option>
						</select>
						<div class="invalid-feedback">
							Masukkan Status
						</div>
					</div>
				</div>
				<fieldset>
					@endforeach
					<center>
						<a href="/audite" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
						<button class="btn btn-primary btn-sm" type="submit">Save</button>
					</center>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection

@push('js')
    {{-- <script src="/example.js"></script> --}}
<script>
	$("#provinsi").select2();

    $(function () {
    $('#provinsi').on('change', function () {
        $.ajax({
            url: '{{ route('audite.get_kota') }}',
            method: 'get',
            data: {id: $(this).val()},
            dataType : 'json',
            success: function (response) {
				// console.log(response);
                $('#kabupaten').empty();

                $.each(response, function (kabupaten_id, kabupaten_name) {
					// console.log(new Option(kabupaten_name, kabupaten_id));
                    $('#kabupaten').append(new Option(kabupaten_name, kabupaten_id))
                })
            }
        })
    });
});
	
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation-pegawai');
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
</script>
@endpush
@push('header')   
<script type="text/javascript">
  
</script> 
@endpush
