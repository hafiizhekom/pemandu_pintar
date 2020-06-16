@extends('layout.app')

@section('content')
    <h3>Daftar Gunung</h3>

    @if(!count($gunung))
        <div class="card mb-3">
            <div class="card-body">
                Tidak ada gunung
            </div>
        </div>
    @endif
    @foreach ($gunung as $item)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <img src="<?=url('upload/gunung/'.$item->gambar);?>" class="w-100">
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <h4 class="pb-3"><a href="<?=url('pendakian/gunung/'.$item->id);?>">Gn. {{$item->nama_gunung}}</a></h4>

                        <div class="form-group row">
                            <label class="col-sm-3">Ketinggian</label>
                            <div class="col-sm-9">
                                {{$item->ketinggian}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Letak</label>
                            <div class="col-sm-9">
                                {{$item->letak}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3">Curah Hujan</label>
                            <div class="col-sm-9">
                                {{$item->curah_hujan}}
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
