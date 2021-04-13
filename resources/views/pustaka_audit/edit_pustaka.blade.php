@extends('sb-admin/app')
@section('title', 'Audite')

@section('content')

<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			
			<h4 class="card-title">Ubah Pustaka Program Audit</h4>
			@foreach ($editPustaka as $item)
			<form method="post" action="{{route('pustaka_prog.update_pustaka_prog', $item->ref_program_id)}}"  class="needs-validation-audite" id="validation-form" enctype="multipart/form-data">
			{{ csrf_field() }}
            <div class="row">
				<div class="col-md-8">
					<div class="form-group row hr">
						<label class="col-md-3 col-form-label">Aspek Program Audit</label>
						<div class="col-md-8">
							<select class="form-control jabatan" name="aspek" id="aspek" required>
								<option value="">Pilih Jabatan</option>
								@foreach ($aspek as $aspek)
									<option {{ ($item->ref_program_aspek_id == $aspek->aspek_id  ) ? 'selected' : ''}}  value="{{$aspek->aspek_id}}" >{{$aspek->aspek_name}}</option>
								@endforeach 
							</select>
							<span class="mandatory">*</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row hr">
						<label class="col-md-2 col-form-label">Kode</label>
						<div class="col-md-8">
							<input type="text" class="form-control" value=" {{ $item->ref_program_code }}" name="code" id="code" placeholder="I" required>
							<span class="mandatory">*</span>
						</div>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-8">
					<div class="form-group row hr">
						<label class="col-md-3 col-form-label">Judul Program Audit</label>
						<div class="col-md-8">
							<input type="text" class="form-control" value="{{ $item->ref_program_title }}" name="title" id="title" placeholder="Judul" required>
							<span class="mandatory">*</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row hr">
						<label class="col-md-2 col-form-label">Kode</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="code_sub" id="code_sub" value="{{ $item->ref_program_code_sub }}" placeholder="A" required>
							<span class="mandatory">*</span>
						</div>
					</div>
				</div>
			</div>
			{{--  --}}
			<div class="form-group row hr">
				<label class="col-md-12 col-form-label">Prosedur/Langkah</label>
                    <div class="col-md-12">
                        <textarea class="ckeditor" cols="10" rows="40" name="procedure" id="procedure" >{{ $item->ref_program_procedure }}</textarea>
                    </div>
			</div>
			@endforeach
				<fieldset>
					<center>
						<a href="/pustaka_prog" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Back</a>
						<button class="btn btn-primary btn-sm" type="submit">Save</button>
					</center>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection
<script src="{{asset('js/ckeditor.js')}}"></script>
@push('js')
<script>

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation-audite');
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
