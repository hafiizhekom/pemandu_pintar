@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Pendakian</h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ajukan-pendakian">Mulai Pendakian</button>
    </div>

    @if(!count($pendakian))
        <div class="card mb-3">
            <div class="card-body">
                Anda belum memulai pendakian apapun
            </div>
        </div>
    @endif

    @foreach ($pendakian as $item)
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>Gn. {{$item->gunung->nama_gunung}}</h5>

                <span>Diposting oleh {{$item->pendaki->nama_lengkap}}, {{date('d M Y', strtotime($item->created_at))}}</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Jumlah</label>
                        <div class="col-sm-8">
                            {{$item->jumlah_orang}} Orang
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4">Tanggal</label>
                        <div class="col-sm-8">
                            {{date('d M Y', strtotime($item->tanggal_keberangkatan))}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4">Hari</label>
                        <div class="col-sm-8">
                            {{$item->hari}} Hari
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-4">Status</label>
                        <div class="col-sm-8">
                            {{ucfirst($item->status)}}
                        </div>
                    </div>

                    @if($item->status != "mencari pemandu")
                    <div class="form-group row">
                        <label class="col-sm-4">Harga</label>
                        <div class="col-sm-8">
                            Rp. {{$item->harga}}
                            @if($item->pembayaran == "N")
                                (Belum Dibayar)
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-4">Pemandu</label>
                        <div class="col-sm-8">

                            @if($item->status == "mencari pemandu")
                                <a class="btn btn-primary" href="<?=url('pendakian/'.$item->id);?>">Cek</a> ({{count($item->pemanduans)}} Pengajuan)
                            @else
                                {{$item->pemandu}}
                            @endif

                        </div>
                    </div>


                    @if($item->pembayaran == "Y")
                        @if($item->status == "menunggu pembayaran pendaki")
                            <a class="btn btn-primary float-right" href="<?=url('pendakian/'.$item->id.'/bayar');?>">Bayar</a>
                        @elseif($item->status == "proses")
                            <form method="post" action="<?=url('pendakian/finish');?>">
                                @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn btn-primary float-right" type="submit">Selesai</button>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('pendaki.modal_pendakian')

@endsection

@section('script')
@endsection

