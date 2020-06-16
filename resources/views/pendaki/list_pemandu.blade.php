@extends('layout.app')

@section('content')
    <h3>Daftar Pemandu</h3>

    @if(!count($user))
        <div class="card mb-3">
            <div class="card-body">
                Belum ada pemandu yang terdaftar
            </div>
        </div>
    @endif
    @foreach ($user as $item)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <img src="<?=url('upload/user/'.$item->foto);?>" class="w-100">
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <div class="form-group row">
                            <label class="col-sm-3">Nama</label>
                            <div class="col-sm-9">
                                {{$item->nama_lengkap}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                {{date('d M Y', strtotime($item->tanggal_lahir))}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Alamat</label>
                            <div class="col-sm-9">
                                {{$item->alamat}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                @if (strtolower($item->jenis_kelamin)==="p")
                                    Pria
                                @else
                                    Wanita
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">No Telepon</label>
                            <div class="col-sm-9">
                                {{$item->no_telepon}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                {{$item->email}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
@endsection
