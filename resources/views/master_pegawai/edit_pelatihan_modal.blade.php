
<form method="POST"  action="{{route('pegawai.update_pelatihan',$edit_pelatihan->pelatihan_id)}}" class="form-horizontal" id="validation-form_editPlatihan" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" value="{{$parent}}" name="parent">
    <div class="form-group">

        <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis Pelatihan</label>
        <select class="custom-select mr-sm-2" id="kompetensi" name="kompetensi">
            <option value="">Pilih Satu</option>
              @foreach ($kompetensi as $kompetensi)
                <option {{ ($edit_pelatihan->pelatihan_kompetensi_id == $kompetensi->kompetensi_id ) ? 'selected' : ''}}  value="{{$kompetensi->kompetensi_id}}" >{{$kompetensi->kompetensi_name}}
                </option>
              @endforeach 
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Pelatihan</label>
        <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" value="{{$edit_pelatihan->pelatihan_nama}}" placeholder="Nama Pelatihan">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Durasi (jam)</label>
      <input type="text" class="form-control" id="durasi" name="durasi" value="{{$edit_pelatihan->pelatihan_durasi}}" placeholder="Enter Durasi">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tanggal</label>
        <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="tgl_mulai_edit" id="tgl_mulai_edit" placeholder="Tanggal Mulai" value="{{$edit_pelatihan->pelatihan_tanggal_awal}}">
            </div>
            <div class="col">
              <input type="text" class="form-control" name="tgl_akhir_edit" id="tgl_akhir_edit" value="{{$edit_pelatihan->pelatihan_tanggal_akhir}}" placeholder="Tanggal Akhir">
            </div>
          </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Penyelenggara</label>
        <input type="text" class="form-control" id="penyelenggara" value="{{$edit_pelatihan->pelatihan_penyelenggara}}" placeholder="Enter Penyelenggara" name="penyelenggara">
        <small id="emailHelp" class="form-text text-muted">Masukkna Nama Penyelenggara</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Unggah Sertifikat</label>
        <a href="{{asset('storage/'.str_replace('public/', '', $edit_pelatihan->pelatihan_sertifikat))}}" class="badge badge-primary" id="sertifikat2" name="sertifikat2">{{str_replace('public/upload/', '', $edit_pelatihan->pelatihan_sertifikat)}}</a>
        <input type="file" class="form-control-file" id="sertifikat" name="sertifikat" >
    </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save</button>
</div>
</form>

@push('js')
<script>
    $("#tgl_mulai_edit, #tgl_akhir_edit").flatpickr();
</script>
@endpush