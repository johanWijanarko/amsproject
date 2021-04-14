@extends('sb-admin/app')
@section('title', 'Pegawai')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Update Inspektorat Penanggung Jawab</h4>
			<form method="post" action="{{route('inspektorat.update_data', $inspektorat->inspektorat_id)}}" class="needs-validation-pegawai" id="validation-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                
				<div class="form-group row">
                    <div class="col-md-3">
                        <label class="col-form-label">Nama Inspektorat</label>
					</div>
					<div class="col-md-8">
                        <input type="text" name="nama" id="nama" value="{{ $inspektorat->inspektorat_name }}" class="form-control" placeholder="masukan Nama" required>
						<label class="error_nip" style="display:none;"></label>
						<span class="mandatory">*</span>
						<div class="invalid-feedback">
                            Masukkan Nama
						</div>
					</div>
				</div>
				<fieldset>
                    <center>
                        <a href="/paraminspektorat" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
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

