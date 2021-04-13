@extends('sb-admin/app')
@section('title', 'Ref Audite')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Tambah Pegawai Inspektorat Utama</h4>
			<form method="post" action="{{route('rfaudit.save_refprog')}}" class="needs-validation-pegawai" id="validation-form" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Refrensi Kategori</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="kategori" id="kategori" required>
							<option value="">Pilih Kategori</option>
							@foreach ($kategori as $kategori)
								<option value="{{$kategori->kategori_ref_id}}">{{$kategori->kategori_ref_name}}</option>
							@endforeach
						</select>
                        <span class="mandatory">*</span>
					</div>
					<div class="invalid-feedback">
						Masukkan Kategori
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nomor/Kode</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="nomorkode" id="nomorkode" class="form-control" placeholder="masukan Kode" >
					</div>
					<div class="invalid-feedback">
						Nomor/Kode
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Tahun</label>
					</div>
					<div class="col-md-8">
						<select class="form-control jabatan" name="tahun" id="tahun" >
							<option value="">Pilih Tahun</option>
							@foreach ($tahun as $tahun)
								<option value="{{$tahun->id_tahun}}">{{$tahun->tahun}}</option>
							@endforeach
						</select>
					</div>
					<div class="invalid-feedback">
						Masukkan Tahun
					</div>
				</div>
				<input type="hidden" name="golongan">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Judul Refrensi</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="refrensi" id="refrensi" class="form-control" placeholder="Masukan Judul Refrensi" required>
                        <span class="mandatory">*</span>
					</div>
					<div class="invalid-feedback">
						Masukkan Refrensi
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Keterangan</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan Keterangan" >
					</div>
					<div class="invalid-feedback">
						Masukkan Keterangan
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Link Sumber</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="link" id="link" class="form-control" placeholder="Masukan Link Sumber" >
						
					</div>
					<div class="invalid-feedback">
						Masukkan Link Sumber
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Lampiran</label>
					</div>
					<div class="col-md-8">
						<input type="file" name="lampiran" id="lampiran" class="form-control" placeholder="Masukan Lampiran" >
					</div>
					<div class="invalid-feedback">
						Masukkan Lampiran
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
