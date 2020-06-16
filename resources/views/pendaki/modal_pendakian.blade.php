<div class="modal" id="ajukan-pendakian" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mulai Pendakian dan Cari Pemandu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=url('pendakian/store');?>">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gunung</label>
                    <div class="col-sm-10">
                        <select class="form-control" placeholder="Gunung" name="gunung">
                            @foreach ($gunung as $item)
                                <option value="{{$item->id}}">Gn. {{$item->nama_gunung}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Orang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="Jumlah Orang" name="jumlah_orang">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Keberangkatan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" placeholder="Tanggal Keberangkatan" name="tanggal_keberangkatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Hari</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="Jumlah Hari" name="hari">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary float-right" value="Mulai">
            </form>
        </div>
      </div>
    </div>
</div>
