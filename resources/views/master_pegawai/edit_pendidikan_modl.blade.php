<form method="POST" action="{{route('pegawai.update_pendidikan',$editpendidikan->pendidikan_id)}}"  class="form-horizontal" id="validation-form_cek" >
    {{ csrf_field() }}
    <input type="hidden" value="{{$parent}}" name="parent">
    <div class="form-group">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Tingkat Pendidikan</label>
        <select class="custom-select mr-sm-2" id="pendidikan" name="pendidikan">
            <option value="">Pilih Satu</option>
            <option value="sma" {{($editpendidikan->pendidikan_tingkat == 'sma' )? 'selected' : ''}}>SMA</option>
            <option value="d3"  {{($editpendidikan->pendidikan_tingkat == 'd3' )? 'selected' : ''}} >D3</option>
            <option value="s1"  {{($editpendidikan->pendidikan_tingkat == 's1' )? 'selected' : ''}} >S1</option>
            <option value="s2"  {{($editpendidikan->pendidikan_tingkat == 's2' )? 'selected' : ''}}>S2</option>
            <option value="s3"  {{($editpendidikan->pendidikan_tingkat == 's3' )? 'selected' : ''}}>S3</option>                         
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Institusi</label>
        <input type="text"  class="form-control" id="institusi" value="{{$editpendidikan->pendidikan_instuisi}}" name="institusi" placeholder="Nama Institusi">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Kota</label>
      <input type="text" class="form-control" id="kota" name="kota" value="{{$editpendidikan->pendidikan_kota}}"  placeholder="Enter Kota">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Negara</label>
            <input type="text" class="form-control" name="negara" id="negara" value="{{$editpendidikan->pendidikan_negara}}"  placeholder="Tanggal Mulai">                                          
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tahun</label>
        <input type="text" class="form-control" id="tahun" value="{{$editpendidikan->pendidikan_tahun}}"  placeholder="Enter Penyelenggara" name="tahun">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{$editpendidikan->pendidikan_jurusan}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Nilai / IPK</label>
        <input type="text" class="form-control" id="nilai" name="nilai" value="{{$editpendidikan->pendidikan_nilai}}" >
    </div>
</div>
{{-- @endforeach --}}
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
