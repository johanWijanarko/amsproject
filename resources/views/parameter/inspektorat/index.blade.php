@extends('sb-admin/app')
@section('title', 'Inspektorat')


@section('content')
<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
            <div style="margin-top: 20px;">
                <h1 class="h3 mb-3 text-gray-800">Inspektorat Penanggung Jawab</h1>
            </div>
            <div style="position: absolute; right: 30px; margin-top: -50px;">
                <p>Cari Data Pegawai :</p>
                <form action="" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="cari" placeholder="Input Nama .." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                </form>   
            </div>     
                <a href="{{ route('inspektorat.tambah_data')}}" class="btn btn-sm btn-primary" role="button" aria-pressed="true" style="position: absolute; right: 30px; margin-top: 25px;" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
            <table class="table table-bordered" style="margin-top: 40px;">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:70px;">No</th>
                        <th style="text-align: center;">Nip</th>
                        <th scope="col" style="width:130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @if ($inspektorat): 
                    @foreach ($inspektorat as $index=>$item)
                    <tr>
                        <th scope="row">{{ $index+1}}</th>
                        <td>{{ $item->inspektorat_name }}</td>
                        <td>
                        <a href="{{ route('inspektorat.edit_data',$item->inspektorat_id )}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-outline-success rounded-circle"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('inspektorat.delete_data', $item->inspektorat_id )}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else:
                    <tr>
                        <td class="c-table__cell u-text-center" colspan="3">No Content</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{-- <br/> --}}
            
            <div class="d-flex justify-content-center">
                Jumlah Data : {{ $inspektorat->total() }}
            </div>
            <div class="d-flex justify-content-center">
                {!! $inspektorat->links() !!}
            </div>
            <a href="/parameter" class="btn btn-primary btn-md" role="button" aria-pressed="true">Back</a>    
            <br>
        </div>
    </div>
</div>    
@endsection