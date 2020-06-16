@extends('layout.app')

@section('content')
    <h3>Daftar Pemandu Pendakian - Gn. {{$pendakian->gunung->nama_gunung}} - {{date('d M Y', strtotime($pendakian->tanggal_keberangkatan))}}</h3>

    @if(!count($pemandu))
        <div class="card mb-3">
            <div class="card-body">
                Belum ada pemandu yang terdaftar
            </div>
        </div>
    @endif
    @foreach ($pemandu as $item)
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
                                {{$item->pemandu->nama_lengkap}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                {{date('d M Y', strtotime($item->pemandu->tanggal_lahir))}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Alamat</label>
                            <div class="col-sm-9">
                                {{$item->pemandu->alamat}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                @if (strtolower($item->pemandu->jenis_kelamin)==="p")
                                    Pria
                                @else
                                    Wanita
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">No Telepon</label>
                            <div class="col-sm-9">
                                {{$item->pemandu->no_telepon}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                {{$item->pemandu->email}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Harga</label>
                            <div class="col-sm-9">
                                Rp. {{$item->harga}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Catatan</label>
                            <div class="col-sm-9">
                                <button class="btn btn-link btn-sm" onclick="openModalCatatan('{{$item->catatan}}')">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" action="<?=url('pemanduan/approve');?>">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="btn btn-primary float-right" type="submit">Terima</button>
                </form>
            </div>
        </div>
    @endforeach

    @include('pendaki.modal_catatan')
@endsection

@section('script')
    <script>
        function openModalCatatan(catatan){
            $("#catatan-fill").html(catatan);
            $("#catatan").modal('show');
        }
    </script>
@endsection
