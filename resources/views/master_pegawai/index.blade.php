@extends('sb-admin/app')
@section('title', 'Pegawai')


@section('content')
<div style="margin-top: 20px;">
  <h1 class="h3 mb-3 text-gray-800">Daftar Pegawai Inspektorat Utama</h1>
</div>
<div style="position: absolute; right: 30px; margin-top: -50px;">
    <p>Cari Data Pegawai :</p>
    <form action="{{route('pegawai.cari')}}" method="GET">
        {{ csrf_field() }}
        <input type="text" name="cari" placeholder="Input Nama .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>   
</div>     
<a href="{{route('pegawai.tambah')}}" class="btn btn-sm btn-primary" role="button" aria-pressed="true" style="position: absolute; right: 30px; margin-top: 25px;" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
<table class="table table-bordered" style="margin-top: 40px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nip</th>
        <th scope="col">Nama</th>
        <th scope="col">Golongan/Pangkat</th>
        <th scope="col">Jabatan</th>
        <th scope="col" style="width:130px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @if ($auditor): 
        @foreach ($auditor as $index=>$auditors)
      <tr>
        <th scope="row">{{$index+1}}</th>
        <td>{{ $auditors->auditor_nip }}</td>
        <td>{{ $auditors->auditor_name }}</td>
        <td>{{ $auditors->auditor_golongan }}</td>
        <td>{{ $auditors->jenis_jabatan_sub }}</td>
        <td>
          <a href="{{route('pegawai.edit',$auditors->auditor_id )}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-outline-success rounded-circle"><i class="fas fa-pencil-alt"></i></a>
          <a href="{{route('pegawai.delete',$auditors->auditor_id )}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
          <a href="{{route('pegawai.detail',$auditors->auditor_id )}}" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-sm btn-outline-info rounded-circle"><i class="fas fa-info-circle"></i></a>    
          </td>
        </tr>
        @endforeach
        @else:
          <tr>
            <td class="c-table__cell u-text-center" colspan="8">No Content</td>
          </tr>
        @endif
    </tbody>
  </table>
  {{-- <br/> --}}
 
  <div class="d-flex justify-content-center">
    Jumlah Data : {{ $auditor->total() }}
  </div>
  <div class="d-flex justify-content-center">
    {!! $auditor->links() !!}
  </div>
  <br>
@endsection