@extends('sb-admin/app')
@section('title', 'Aduditee')


@section('content')
<div class="col-md-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Daftar Aduditee</h4>
			<div style="margin-top: 20px; margin-left:10px;">

            </div><br><br><br><br>
            <div style="position: absolute; right: 38px; margin-top: -120px; ">
                <p>Cari Data Aduditee :</p>
                <form action="{{route('audite.cari')}}" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="cari" placeholder="Input Nama .." value="">
                    <input type="submit" value="CARI">
                </form>   
            </div>
            <a href="{{route('audite.tambah')}}" class="btn btn-sm btn-primary" role="button" aria-pressed="true" style="position: absolute; right: 38px; margin-top: -35px;" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
            <div class="col">
            <table class="table table-bordered"> 
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Auditee</th>
                    <th scope="col">Nama Auditee</th>
                    <th scope="col">Unit Eslon 1</th>
                    <th scope="col">Show</th>
                    <th scope="col" style="width:130px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($auditee): 
                  @foreach ($auditee as $index=>$auditees)
                  <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $auditees->auditee_kode }}</td>
                    <td>{{ $auditees->auditee_name }}</td>
                    <td>{{ $auditees->esselon_name }}</td>
                    <td>
                      @if ($auditees->auditee_show_status === 1)
                        Show
                      @else
                        Hide
                      @endif
                  </td>
                    <td>
                        <a href="{{route('audite.get_audite', $auditees->auditee_id)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-outline-success rounded-circle"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{route('audite.delete_audite', $auditees->auditee_id)}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-outline-danger rounded-circle"><i class="far fa-trash-alt"></i></a>
                        <a href="{{route('audite.detail_audite', $auditees->auditee_id)}}" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-info-circle"></i></a>
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
                {{ $auditee->links() }}
              </div>
              <br>
            </div>
		</div>
	</div>
</div>
@endsection