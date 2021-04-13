<form method="POST" action="{{route('audite.update_pejabat',$detail_pejabat->pic_id)}}"  class="form-horizontal" id="validation-form_pejabat" >
    {{ csrf_field() }}
        
    <div class="form-group">
        <input type="hidden" value="{{$parent}}" name="parent">
        <label for="exampleInputEmail1">NIP</label>
        <input type="text"  class="form-control" id="nip" value="{{ $detail_pejabat->pic_nip }}" name="nip">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $detail_pejabat->pic_name }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jabatan</label>
            <select class="custom-select mr-sm-2" id="jabatan" name="jabatan">
                @foreach ($jabatan as $jabatan)
                    <option {{ ($detail_pejabat->pic_jabatan_id == $jabatan->jabatan_pic_id ) ? 'selected' : ''}}  value="{{$jabatan->jabatan_pic_id}}" >{{$jabatan->jabatan_pic_name}}</option>
                @endforeach 
            </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $detail_pejabat->pic_mobile }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Telp</label>
        <input type="text" class="form-control" id="telp" name="telp" value="{{ $detail_pejabat->pic_telp }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $detail_pejabat->pic_email }}">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
