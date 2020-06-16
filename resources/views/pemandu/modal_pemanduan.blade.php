<div class="modal" id="ajukan-pemanduan" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Daftar Pemanduan Gn. <span id="nama_gunung"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=url('pemanduan/store');?>">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jumlah Orang</label>
                    <div class="col-sm-8">
                       <span id="jumlah_orang"></span> Orang
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                       <span id="tanggal"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Hari</label>
                    <div class="col-sm-8">
                       <span id="hari"></span> Hari
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="Harga" name="harga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Catatan Pemandu</label>
                    <textarea class="form-control" placeholder="Catatan Pemandu" name="catatan"></textarea>
                </div>
                <input type="hidden" id="id_pendakian" name="pendakian" value="">
                <input type="submit" class="btn btn-primary float-right" value="Ajukan">
            </form>
        </div>
      </div>
    </div>
</div>
