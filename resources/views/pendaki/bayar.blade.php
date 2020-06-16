@extends('layout.app')

@section('content')
    <h3>Konfirmasi Bukti Pembayaran Pemandu</h3>

    <h4 class="mt-5">Data Pendakian</h4>
    <div class="card mb-3">
        <div class="card-header">
            Gn {{$pendakian->gunung->nama_gunung}}
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3">Nama</label>
                <div class="col-sm-9">
                    {{$pendakian->pendaki->nama_lengkap}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3">Jumlah Orang</label>
                <div class="col-sm-9">
                    {{$pendakian->jumlah_orang}} Orang
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3">Tanggal Keberangkatan</label>
                <div class="col-sm-9">
                    {{date('d M Y', strtotime($pendakian->tanggal_keberangkatan))}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3">Hari</label>
                <div class="col-sm-9">
                    {{$pendakian->hari}} Hari
                </div>
            </div>
        </div>
    </div>


    <h4 class="mt-5">Data Pemandu</h4>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <img src="<?=url('asset/logo.jpg');?>" class="w-100">
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="form-group row">
                        <label class="col-sm-3">Nama</label>
                        <div class="col-sm-9">
                            {{$pemanduan->pemandu->nama_lengkap}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            {{date('d M Y', strtotime($pemanduan->pemandu->tanggal_lahir))}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Alamat</label>
                        <div class="col-sm-9">
                            {{$pemanduan->pemandu->alamat}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            @if (strtolower($pemanduan->pemandu->jenis_kelamin)==="p")
                                Pria
                            @else
                                Wanita
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">No Telepon</label>
                        <div class="col-sm-9">
                            {{$pemanduan->pemandu->no_telepon}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Email</label>
                        <div class="col-sm-9">
                            {{$pemanduan->pemandu->email}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Harga</label>
                        <div class="col-sm-9">
                            Rp. {{$pemanduan->harga}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">No Rekening</label>
                        <div class="col-sm-9">
                            {{$pemanduan->pemandu->no_rekening}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Bank</label>
                        <div class="col-sm-9">
                            {{$pemanduan->pemandu->bank}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Catatan</label>
                        <div class="col-sm-9">
                            <button class="btn btn-link btn-sm" onclick="openModalCatatan('{{$pemanduan->catatan}}')">Lihat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <div class="w-50">
            <button class="btn btn-primary" onclick="$('#imgupload').click();">Unggah Bukti Pembayaran</button>
            <img id="preview-img" class="w-100 mt-3" src="#" style="display:none"/>
        </div>
        <div class="row w-25">
            <div class="col-sm-2">Total</div>
            <div class="col-sm-10">Rp. {{$pemanduan->harga}}
                <form method="post" action="<?=url('pendakian/pay');?>" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{$pendakian->id}}">
                    <input id="imgupload" type="file" name="image" style="display:none;"/>
                    <button class="btn btn-primary float-right">Bayar</button>
                </form>
            </div>
        </div>
    </div>





    @include('pendaki.modal_catatan')
@endsection

@section('script')
    <script>
         function openModalCatatan(catatan){
            $("#catatan-fill").html(catatan);
            $("#catatan").modal('show');
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-img').css('display', 'block');
                    $('#preview-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

            $("#imgupload").change(function() {
                readURL(this);
            });
    </script>
@endsection
