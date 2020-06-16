@extends('layout.app')

@section('content')
        <div class="row">
            <div class="col-8">
                <form method="post" enctype="multipart/form-data" action="<?=url('auth/signup');?>">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" placeholder="Jenis Kelamin" name="jenis_kelamin" required>
                                <option value="p">Pria</option>
                                <option value="w">Wanita</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No Telepon" name="no_telepon" onkeyup="numOnly(this)" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Rekening & Bank</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Nomor Rekening" name="no_rekening" onkeyup="numOnly(this)" required>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Nama Bank" name="bank" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kata Sandi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ulangi Kata Sandi</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Repassword" name="repassword" required>
                        </div>
                    </div>
                    <input type="hidden" name="role" value="pemandu">
                    <input type="submit" class="btn btn-primary btn-block" value="Daftar">
                </form>

                <p>Apakah anda sudah memiliki akun? <a href="<?=url('/signin');?>">Login</a></p>
            </div>
        </div>

@endsection

@section('script')
@endsection
