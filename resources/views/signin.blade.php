@extends('layout.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <img src="<?=asset("asset/logo.png");?>" class="w-50 p-3">
                <h4>Selamat Datang di Pemandu Pintar</h4>
                <form method="post" action="<?=url('auth/signin');?>">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Masuk">
                </form>

                <p>Apakah anda sudah memiliki akun? <a href="<?=url('signup');?>">Daftar</a></p>
            </div>
        </div>

@endsection

@section('script')
@endsection
