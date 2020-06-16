@extends('layout.app')

@section('content')
    <h3>Riwayat Pemanduan</h3>

    @if(!count($pemanduan))
        <div class="card mb-3">
            <div class="card-body">
                Tidak ada pemanduan
            </div>
        </div>
    @endif
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

                    <div class="form-group row">
                        <label class="col-sm-4">Pembayaran</label>
                        <div class="col-sm-8">
                            @if($item->pendakian->pembayaran=='Y')
                                Selesai (<a href="#" onclick="openModalBktPembayaran('{{$item->pendakian->bukti_pembayaran}}')">Cek Bukti Pembayaran</a>)
                            @else
                                Belum dibayar
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if ($item->pendakian->pembayaran=='Y' && $item->pendakian->status!='proses')
            <form method="post" action="<?=url('pemanduan/confirmation');?>">
                @csrf
                <input type="hidden" name="id" value="{{$item->pendakian->id}}">
                <button class="btn btn-primary float-right" type="submit">Konfirmasi</button>
            @endif
        </div>
    </div>
    @endforeach
    @include('pemandu.modal_buktipembayaran')
@endsection

@section('script')
    <script>
        function openModalBktPembayaran(buktipembayaran){
            $("#bukti-pembayaran-image").attr("src","<?=url('')?>/upload/pembayaran/"+buktipembayaran);
            $("#bukti-pembayaran").modal('show');
        }
    </script>
@endsection

