@extends('sb-admin/app')
@section('title', 'Audite')


@section('content')
<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Daftar Pustaka Program Audit</h4>
			<div style="margin-top: 20px; margin-left:10px;">

            </div><br><br><br><br>
            <div style="position: absolute; right: 38px; margin-top: -120px; ">
                <p>Cari Data Audite :</p>
                <form action="{{ route ('pustaka_prog.cari')}}" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="cari" placeholder="Input Judul Program .." value="">
                    <input type="submit" value="CARI">
                </form>   
            </div>
            <a href="{{route('pustaka_prog.tambah_pustaka_prog')}}" class="btn btn-sm btn-primary" role="button" aria-pressed="true" style="position: absolute; right: 38px; margin-top: -35px;" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
            <div class="col">
            <table class="table table-bordered"> 
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Program</th>
                    <th scope="col">Aspek program</th>
                    <th scope="col" style="width:130px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @if ($refprogram): 
                  @foreach ($refprogram as $index=>$item)
                      
                  <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{ $item->ref_program_title }}</td>
                    <td>{{ $item->aspek_name }}</td>
                    <td>
                        <a href="{{ route('pustaka_audit.detail_pustaka_prog', $item->ref_program_id)}}" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-info-circle"></i></a> 

                        <a href="{{ route('pustaka_prog.edit_pustaka_prog', $item->ref_program_id)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-outline-success rounded-circle"><i class="fas fa-pencil-alt"></i></a>
                        
                        <a href="{{ route('pustaka_prog.delete_pustaka_prog', $item->ref_program_id)}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
                              
                    </td>
                  </tr>
                  @endforeach
                @else:
                  <tr>
                    <td class="c-table__cell u-text-center" colspan="6">No Content</td>
                  </tr>
                @endif
                </tbody>
              </table>
              <br/>
              <div class="d-flex justify-content-center">
                {{ $refprogram->links() }}
              </div>
              <br>
            </div>
		</div>
	</div>
</div>
@endsection