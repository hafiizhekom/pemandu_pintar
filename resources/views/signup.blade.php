@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <img src="<?=asset("asset/logo.png");?>" class="w-50 p-3">
                <h4>Selamat Datang di Pemandu Pintar</h4>
                <a class="btn btn-primary btn-block mt-3" href="<?=url('signup/pendaki');?>">Pendaki</a>
                <a class="btn btn-primary btn-block mt-3" href="<?=url('signup/pemandu');?>">Pemandu</a>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
