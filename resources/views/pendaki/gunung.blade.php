@extends('layout.app')

@section('content')
<h3 class="pb-3">Gunung {{$gunung->nama_gunung}}</h3>
<div class="row">

    <div class="col-sm-12 col-md-4 col-lg-4">
        <img class="w-100" src=<?=url('upload/gunung/'.$gunung->gambar);?>>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">

        <div class="form-group row">
            <label class="col-sm-3">Ketinggian</label>
            <div class="col-sm-9">
                {{$gunung->ketinggian}} mdpl
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Letak</label>
            <div class="col-sm-9">
                {{$gunung->letak}}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3">Curah Hujan</label>
            <div class="col-sm-9">
                {{$gunung->curah_hujan}}
            </div>
        </div>

    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        Keterangan
    </div>
    <div class="card-body">
        {{$gunung->keterangan}}
    </div>
</div>


@endsection

@section('script')
@endsection
