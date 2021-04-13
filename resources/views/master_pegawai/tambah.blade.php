@extends('sb-admin/app')
@section('title', 'Pegawai')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Tambah Pegawai Inspektorat Utama</h4>
			<form method="post" action="{{route('pegawai.save')}}" class="needs-validation-pegawai" id="validation-form" enctype="multipart/form-data">
			{{ csrf_field() }}

				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">NIP</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="nip" id="nip" class="form-control" maxlength="18" placeholder="masukan NIP" required>
						<label class="error_nip" style="display:none;"></label>
						<span class="mandatory">*</span>
						<div class="invalid-feedback">
							Masukkan NIP
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nama</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="name" id="name" class="form-control" placeholder="masukan Nama" required>
						<span class="mandatory">*</span>
						<div class="invalid-feedback">
							Masukkan Nama
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Tempat, Tanggal Lahir</label>
					</div>
					<div class="col-md-8 row">
						<div class="col-md-4">
							<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control tempat_lahir" placeholder="masukan Tempat Lahir" required>
							<div class="invalid-feedback">
								Masukkan Tempat Lahir
							</div>
						</div>
						<div class="col-md-8">
							<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="masukan tanggal Lahir" required>
							<div class="invalid-feedback">
								Masukkan Tanggal Lahir
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Alamat Rumah</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="alamat" id="alamat" class="form-control" placeholder="masukan Alamat Rumah" required>
						<div class="invalid-feedback">
							Masukkan Alamat Rumah
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Jenis Kelamin</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" id="kelamin" name="kelamin" required>
							<option value="">Choose...</option>
							<option value="pria">Pria</option>
							<option value="wanita">Wanita</option>
						</select>
						<div class="invalid-feedback">
							Masukkan Jenis Kelamin
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Agama</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="agama" id="agama" required>
							<option value="">Choose...</option>
							<option value="islam">Islam</option>
							<option value="katolik">Katolik</option>
							<option value="kristen">Kristen</option>
							<option value="budha">Budha</option>
							<option value="hindu">Hindu</option>
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Agama
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Unit Inspektorat</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="inspektorat" id="inspektorat" required>
							<option value="">Pilih Inspektorat</option>
							@foreach ($insprktorat as $insprktorats)
								<option value="{{$insprktorats->inspektorat_id}}">{{$insprktorats->inspektorat_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Unit Inspektorat
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Golongan/Pangkat</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="pangkat" id="pangkat" required>
							<option value="">Pilih Pangkat</option>
							@foreach ($pangkat as $pangkats)
								<option value="{{$pangkats->pangkat_id}}">{{$pangkats->auditor_pangkat}}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Golongan/Pangkat
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">TMT</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="tmt" id="tmt" class="form-control" placeholder="masukan TMT" required>
					</div>
					<div class="invalid-feedback">
						Masukkan TMT
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Jabatan</label>
					</div>
					<div class="col-md-8">
						<select class="form-control jabatan" name="jabatan" id="jabatan" required>
							<option value="">Pilih Jabatan</option>
							@foreach ($jabatan as $jabatans)
								<option value="{{$jabatans->jenis_jabatan_id}}">{{$jabatans->auditor_jabatan}}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Jabatan
					</div>
				</div>
				<input type="hidden" name="golongan">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Mobile</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="mobile" id="mobile" class="form-control" placeholder="masukan Mobile" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Mobile
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Telp</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="telp" id="telp" class="form-control" placeholder="masukan Nomor Telepon" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Telp
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Email</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="email_auditor" id="email_auditor" class="form-control" placeholder="masukan Alamat Email" required>
						<span class="mandatory">*</span>
					</div>
					<div class="invalid-feedback">
						Masukkan Email
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Unggah Foto</label>
					</div>
					<div class="col-md-8">
						<input type="file" name="foto" id="foto" class="form-control" placeholder="masukan photo" required>
					</div>
					<div class="invalid-feedback">
						Masukkan Foto
					</div>
				</div>
              
				<fieldset>
					<center>
						<a href="/pegawai" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
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
	$("#nip").on('keyup keydown', function() {
		$(".error_nip").css("display", "block");
		$(".error_nip").text($(this).val().length);
	});
		

	$(".pangkat, .jabatan").select2({
	maximumSelectionLength: 2
	});
	
	$("#tanggal_lahir, #tmt").flatpickr();
	$('#validation-form').bootstrapValidator('revalidateField', 'tanggal_lahir');

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
