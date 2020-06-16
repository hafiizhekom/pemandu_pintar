@extends('layout.app')

@section('content')
        <h3 class="mb-3">Ubah Kata Sandi</h3>
        <div class="row">
            <div class="col-8">
                <form method="post" enctype="multipart/form-data" action="<?=url('auth/profile/password');?>">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Password" name="old_password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ulangi Kata Sandi Baru</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Repassword" name="repassword" required>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{session()->get('id')}}">
                    <input type="submit" class="btn btn-primary btn-block" value="Ubah">
                </form>
            </div>
        </div>

@endsection

@section('script')
@endsection

