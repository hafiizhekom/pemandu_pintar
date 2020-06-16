@extends('layout.app')

@section('content')
<div class="row">

    <div class="col-sm-12 col-md-4 col-lg-4">
        <img class="w-100" src=<?=url('upload/user/'.$user->foto);?>>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="d-flex justify-content-between mb-3">
            <h3>Informasi

                @if($user->role=="pendaki")
                    Pendaki
                @elseif($user->role=="pemandu")
                    Pemandu
                @endif
            </h3>
            @if($user->id==session()->get('id'))
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary mr-1" href="<?=url('profile/ubah')?>">Ubah Profil</a>
                    <a class="btn btn-primary" href="<?=url('profile/password/ubah')?>">Ubah Kata Sandi</a>
                </div>
            @endif
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Nama Lengkap</label>
            <div class="col-sm-9">
                {{$user->nama_lengkap}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Tanggal Lahir</label>
            <div class="col-sm-9">
                {{date('d M Y', strtotime($user->tanggal_lahir))}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Jenis Kelamin</label>
            <div class="col-sm-9">
                @if(strtolower($user->jenis_kelamin)=="p")
                    Pria
                @else
                    Wanita
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Alamat</label>
            <div class="col-sm-9">
                {{$user->alamat}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">No Telepon</label>
            <div class="col-sm-9">
                {{$user->no_telepon}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Email</label>
            <div class="col-sm-9">
                {{$user->email}}
            </div>
        </div>

        @if($user->role=="pendaki")
            <div class="form-group row">
                <label class="col-sm-3">Riwayat Penyakit</label>
                <div class="col-sm-9">
                    {{$user->riwayat_penyakit}}
                </div>
            </div>
        @elseif($user->role=="pemandu")
            <div class="form-group row">
                <label class="col-sm-3">No Rekening</label>
                <div class="col-sm-7">
                    {{$user->no_rekening}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3">Bank</label>
                <div class="col-sm-7">
                    {{$user->bank}}
                </div>
            </div>
        @endif

    </div>
</div>

@if($user->role=="pemandu")
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between">
            Keterangan Pemandu
        </div>
        <div class="card-body">

            @if($user->id==session()->get('id'))
                <form method="POST" action="<?=url('auth/profile/keterangan');?>">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="keterangan" required>{{$user->keterangan}}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </form>
            @else
                <p>{{$user->keterangan}}</p>
            @endif
        </div>
    </div>
@endif


@if($pemanduan ?? '')
<h4 class="pt-5">Riwayat Pemanduan Berhasil</h4>
@foreach ($pemanduan as $item)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>Gn. {{$item->pendakian->gunung->nama_gunung}}</h5>

                <span>Diposting oleh <a href="<?=url('pemanduan/pendaki/'.$item->pendakian->pendaki->id);?>">{{$item->pendakian->pendaki->nama_lengkap}}</a>, {{date('d M Y', strtotime($item->pendakian->created_at))}}</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Jumlah</label>
                        <div class="col-sm-8">
                            {{$item->pendakian->jumlah_orang}} Orang
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4">Tanggal</label>
                        <div class="col-sm-8">
                            {{date('d M Y', strtotime($item->pendakian->tanggal_keberangkatan))}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4">Hari</label>
                        <div class="col-sm-8">
                            {{$item->pendakian->hari}} Hari
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Status</label>
                        <div class="col-sm-8">
                            {{ucfirst($item->pendakian->status)}}
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4">Harga</label>
                        <div class="col-sm-8">
                            Rp. {{$item->harga}}
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    @endforeach
    @endif

@endsection

@section('script')
@endsection
