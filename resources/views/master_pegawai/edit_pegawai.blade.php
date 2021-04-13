@extends('sb-admin/app')
@section('title', 'Pegawai')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			@foreach ($detail_auditor as $auditor)
			<h4 class="card-title">Tambah Pegawai Inspektorat Utama</h4>
			<form method="post" action="{{route('pegawai.update',$auditor->auditor_id )}}" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">NIP</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="nip" id="nip" class="form-control" maxlength="18" placeholder="masukan NIP" value="{{$auditor->auditor_nip}}">
						<label class="error_nip" style="display:none;"></label>
						<span class="mandatory">*</span>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Nama</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="name" id="name" value="{{$auditor->auditor_name}}" class="form-control" placeholder="masukan Nama">
						<span class="mandatory">*</span>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Tempat, Tanggal Lahir</label>
					</div>
					<div class="col-md-8 row">
						<div class="col-md-4">
							<input type="text" name="tempat_lahir" id="tempat_lahir" value="{{$auditor->auditor_tempat_lahir}}"  class="form-control tempat_lahir" placeholder="masukan Tempat Lahir">
						</div>
						<div class="col-md-8">
							<input type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{$auditor->auditor_tgl_lahir}}" class="form-control" placeholder="masukan tanggal Lahir">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Alamat Rumah</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="alamat" id="alamat"  value="{{$auditor->auditor_alamat}}" class="form-control" placeholder="masukan Alamat Rumah">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Jenis Kelamin</label>
					</div>
					<div class="col-md-8">
						<select class="custom-select mr-sm-2" id="kelamin" name="kelamin">
							<option selected>Choose...</option>
							<option value="Laki Laki" {{($auditor->auditor_jenis_kelamin == 'Laki Laki' )? 'selected' : ''}}>Pria</option>
							<option value="Perempuan" {{($auditor->auditor_jenis_kelamin == 'Perempuan' )? 'selected' : ''}}>Wanita</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Agama</label>
					</div>
					<div class="col-md-8">
						<select class="custom-select mr-sm-2" id="agama" name="agama">
							<option selected>Choose...</option>
							<option value="Islam" {{($auditor->auditor_agama == 'Islam' )? 'selected' : ''}}>Islam</option>
							<option value="katolik" {{($auditor->auditor_agama == 'katolik' )? 'selected' : ''}}>Katolik</option>
							<option value="kristen" {{($auditor->auditor_agama == 'kristen' )? 'selected' : ''}}>Kristen</option>
							<option value="budha" {{($auditor->auditor_agama == 'budha' )? 'selected' : ''}}>Budha</option>
							<option value="hindu" {{($auditor->auditor_agama == 'hindu' )? 'selected' : ''}}>Hindu</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Unit Inspektorat</label>
					</div>
					<div class="col-md-8">
						<select class="form-control" name="inspektorat" id="inspektorat">
							<option value="">Pilih Inspektorat</option>
							@foreach ($insprktorat as $insprktorats)
								<option {{ ($auditor->auditor_unit_inspektorat == $insprktorats->inspektorat_id ) ? 'selected' : ''}}  value="{{$insprktorats->inspektorat_id}}" >{{$insprktorats->inspektorat_name}}</option>
							@endforeach 
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Golongan/Pangkat</label>
					</div>
					<div class="col-md-8">
						<select class="form-control pangkat" name="pangkat" id="pangkat">
							<option value="">Pilih Pangkat</option>
							@foreach ($pangkat as $pangkats)
								<option {{ ($auditor->auditor_id_pangkat == $pangkats->pangkat_id ) ? 'selected' : ''}}  value="{{$pangkats->pangkat_id}}" >{{$pangkats->auditor_pangkat}}</option>
							@endforeach 
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">TMT</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="tmt" id="tmt"  value="" class="form-control" placeholder="masukan TMT">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Jabatan</label>
					</div>
					<div class="col-md-8">
						<select class="form-control jabatan" name="jabatan" id="jabatan">
							<option value="">Pilih Jabatan</option>
							@foreach ($jabatan as $jabatans)
								<option {{ ($auditor->auditor_id_jabatan == $jabatans->jenis_jabatan_id ) ? 'selected' : ''}}  value="{{$jabatans->jenis_jabatan_id}}" >{{$jabatans->auditor_jabatan}}</option>
							@endforeach 
						</select>
					</div>
				</div>
				<input type="hidden" name="golongan">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Mobile</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="mobile" id="mobile" value="{{$auditor->auditor_mobile}}" class="form-control" placeholder="masukan Mobile">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Telp</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="telp" id="telp" value="{{$auditor->auditor_telp}}"  class="form-control" placeholder="masukan Nomor Telepon">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Email</label>
					</div>
					<div class="col-md-8">
						<input type="text" name="email_auditor" id="email_auditor"  value="{{$auditor->auditor_email}}"  class="form-control" placeholder="masukan Alamat Email">
						<span class="mandatory">*</span>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3">
						<label class="col-form-label">Unggah Foto</label>
					</div>
					<div class="col-md-8">
						{{-- <a href="{{asset('storage/'.$auditor->auditor_foto)}}" value="{{$auditor->auditor_foto}}" class="badge badge-primary" id="foto" name="foto">File</a> --}}

						<a href="{{asset('storage/'.str_replace('public/', '', $auditor->auditor_foto))}}" class="badge badge-primary" id="sertifikat2" name="sertifikat2">{{str_replace('public/upload/', '', $auditor->auditor_foto)}}</a>

						<input type="file" name="foto" id="foto" value="{{$auditor->auditor_foto}}" class="form-control" placeholder="masukan photo">
					</div>
				</div>
              
				<fieldset>
					<center>
						<a href="/pegawai" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
						<button class="btn btn-primary btn-sm" type="submit">Save</button>
					</center>
				</fieldset>
			@endforeach
			</form>
		</div>
	</div>
</div>
@endsection

@push('js')
    {{-- <script src="/example.js"></script> --}}
<script>

	$(".pangkat, .jabatan").select2({
	maximumSelectionLength: 2
	});
	
	$("#tanggal_lahir, #tmt").flatpickr();

	$("#nip").on('keyup keydown', function() {
		$(".error_nip").css("display", "block");
		$(".error_nip").text($(this).val().length);
	});


</script>
@endpush

@push('header')
@endpush
