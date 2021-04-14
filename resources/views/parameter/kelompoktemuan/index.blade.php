@extends('sb-admin/app')
@section('title', 'Inspektorat')


@section('content')
<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
            <div style="margin-top: 20px;">
                <h1 class="h3 mb-3 text-gray-800">Daftar Sub Kelompok</h1>
            </div>
            <div style="position: absolute; right: 30px; margin-top: -50px;">
                <p>Cari Sub Kelompok :</p>
                <form action="" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="cari" placeholder="Input Sub Kelompok .." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                </form>   
            </div>     
                <a href="" class="btn btn-sm btn-primary" role="button" aria-pressed="true" style="position: absolute; right: 30px; margin-top: 25px;" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
            <table class="table table-bordered" style="margin-top: 40px;">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th style="text-align: center; width:120px;">Kode Sub Kelompok</th>
                        <th style="text-align: center;">Sub Kelompok</th>
                        <th style="text-align: center;">Kelompok</th>
                        <th scope="col" style="width:130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                {{-- @if ($auditor): 
                    @foreach ($auditor as $index=>$auditors) --}}
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-outline-success rounded-circle"><i class="fas fa-pencil-alt"></i></a>
                        <a href="" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    {{-- @endforeach
                    @else: --}}
                    <tr>
                        <td class="c-table__cell u-text-center" colspan="5">No Content</td>
                    </tr>
                    {{-- @endif --}}
                </tbody>
            </table>
            {{-- <br/> --}}
            
            <div class="d-flex justify-content-center">
                {{-- Jumlah Data : {{ $auditor->total() }} --}}
            </div>
            <div class="d-flex justify-content-center">
                {{-- {!! $auditor->links() !!} --}}
            </div>
            <br>
            <a href="/parameter" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>  
        </div>
    </div>
</div>        
@endsection