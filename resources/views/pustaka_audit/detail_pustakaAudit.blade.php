@extends('sb-admin/app')
@section('title', 'Audite')


@section('content')
<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h3>Rincian Pustaka Program Audit</h3><br><br>
			@foreach ($detailPustaka as $item)
            <div class="row">
				<div class="col-md-8">
					<div class="form-group row hr">
						<label class="col-md-3 col-form-label">Aspek Program Audit</label>
						<div class="col-md-8">
							<span class="">: {{ $item->aspek_name }}</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row hr">
						<label class="col-md-2 col-form-label">Kode</label>
						<div class="col-md-8">
							<span class="">: {{ $item->ref_program_code }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group row hr">
						<label class="col-md-3 col-form-label">Judul Program Audit</label>
						<div class="col-md-8">
							<span class="">: {{ $item->ref_program_title }}</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row hr">
						<label class="col-md-2 col-form-label">Kode</label>
						<div class="col-md-8">
							<span class="">: {{ $item->ref_program_code_sub }}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row hr">
				<label class="col-md-12 col-form-label">Prosedur/Langkah</label>
				<div style="" class="col-md-12">
					<span  id="procedure">{!! $item->ref_program_procedure !!}</span>
				</div>
			</div>
			<a href="/pustaka_prog" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>
			@endforeach
        </div>
    </div>
</div>

@endsection

@push('js')
    
 

@endpush