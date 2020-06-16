@extends('layout.app')

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="<?=url('dashboard');?>">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gunung</label>
                                <div class="col-sm-10">
                                    <select class="form-control" placeholder="Gunung" name="gunung">
                                            <option value="">All</option>
                                        @foreach ($gunung as $item)
                                            <option value="{{$item->id}}">Gn. {{$item->nama_gunung}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah_orang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" placeholder="Tanggal" name="tanggal_keberangkatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="Hari" name="hari">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary float-right" value="Cari">
                        </form>
                    </div>
                </div>
                <hr>
                @foreach ($pendakian as $item)
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5>Gn. {{$item->gunung->nama_gunung}}</h5>

                            <span>Diposting oleh <a href="<?=url('pemanduan/pendaki/'.$item->pendaki->id);?>">{{$item->pendaki->nama_lengkap}}</a>, {{date('d M Y', strtotime($item->created_at))}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jumlah</label>
                                    <div class="col-sm-8">
                                        {{$item->jumlah_orang}} Orang
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        {{date('d M Y', strtotime($item->tanggal_keberangkatan))}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Hari</label>
                                    <div class="col-sm-8">
                                        {{$item->hari}} Hari
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary float-right" onclick="openModalPemanduan({{$item->id}}, '{{$item->gunung->nama_gunung}}', {{$item->jumlah_orang}}, '{{date('d M Y', strtotime($item->tanggal_keberangkatan))}}', {{$item->hari}})">Terima</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @include('pemandu/modal_pemanduan')
@endsection

@section('script')
        <script>
            function openModalPemanduan(id, gunung, jumlah_orang, tanggal, hari){
                $("#nama_gunung").html(gunung);
                $("#jumlah_orang").html(jumlah_orang);
                $("#tanggal").html(tanggal);
                $("#hari").html(hari);
                $("#id_pendakian").val(id);
                $("#ajukan-pemanduan").modal('show');
            }
        </script>
@endsection
