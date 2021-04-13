<form>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">NIP</label>
        <input type="text"  class="form-control" id="nip" value="{{ $detail_pejabat->pic_nip }}" name="nip" readonly>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $detail_pejabat->pic_name }}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $detail_pejabat->jabatan_pic_name }}" readonly>                                          
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $detail_pejabat->pic_mobile }}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Telp</label>
        <input type="text" class="form-control" id="telp" name="telp" value="{{ $detail_pejabat->pic_telp }}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $detail_pejabat->pic_email }}" readonly>
    </div>
</div>
{{-- @endforeach --}}
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
