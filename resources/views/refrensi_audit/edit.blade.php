@extends('sb-admin/app')
@section('title', 'Ref Audite')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Update Pegawai Inspektorat Utama</h4>
			<form method="post" action="{{route('rfaudit.update_refprog', $refaudit->ref_audit_id )}}" class="needs-validation-pegawai" id="validation-form" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Refrensi Kategori</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="kategori" id="kategori" required>
							<option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kategori)
								<option {{ ($refaudit->ref_audit_id_kategori == $kategori->kategori_ref_id ) ? 'selected' : ''}}  value="{{$kategori->kategori_ref_id}}" >{{$kategori->kategori_ref_name}}</option>
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
						<input type="text" name="nomorkode" id="nomorkode" value="{{ $refaudit->ref_audit_no_kode}}" class="form-control" placeholder="masukan Kode" >
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
                            @foreach ($tahun as $tahun)
                            <option {{ ($refaudit->ref_audit_tahun == $tahun->id_tahun ) ? 'selected' : ''}}  value="{{$tahun->id_tahun}}" >{{$tahun->tahun}}</option>
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
						<input type="text" name="refrensi" id="refrensi" value="{{ $refaudit->ref_audit_nama}}" class="form-control" placeholder="Masukan Judul Refrensi" required>
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
						<input type="text" name="keterangan" id="keterangan" value="{{ $refaudit->ref_audit_desc}}" class="form-control" placeholder="Masukan Keterangan" >
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
						<input type="text" name="link" id="link"  value="{{ $refaudit->ref_audit_link}}" class="form-control" placeholder="Masukan Link Sumber" >
						
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
                        <a href="{{asset('storage/'.str_replace('public/', '', $refaudit->ref_audit_attach))}}" class="badge badge-primary" id="lampiran" name="lampiran">{{str_replace('public/upload/', '', $refaudit->ref_audit_attach)}}</a>

						<input type="file" name="lampiran" id="lampiran"  value="{{$refaudit->ref_audit_attach}}" class="form-control" placeholder="Masukan Lampiran" >
					</div>
					<div class="invalid-feedback">
						Masukkan Lampiran
					</div>
				</div>
              
				<fieldset>
					<center>
						<a href="/rfaudit" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
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
