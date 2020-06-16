@extends('layout.app')

@section('content')
        <h3 class="mb-3">Ubah Profil</h3>
        <div class="row">
            <div class="col-8">
                <form method="post" enctype="multipart/form-data" action="<?=url('auth/profile');?>">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" value="{{$user->nama_lengkap}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{$user->tanggal_lahir}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" placeholder="Jenis Kelamin" name="jenis_kelamin" required>
                                @if(strtolower($user->jenis_kelamin)=="p")
                                    <option value="p" selected>Pria</option>
                                    <option value="w">Wanita</option>
                                @else
                                    <option value="p">Pria</option>
                                    <option value="w" selected>Wanita</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Alamat" name="alamat" required>{{$user->alamat}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="No Telepon" name="no_telepon" onkeyup="numOnly(this)" value="{{$user->no_telepon}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}" required>
                        </div>
                    </div>

                    @if(session()->get('role')=="pendaki")
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Riwayat Penyakit</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Riwayat Penyakit" name="riwayat_penyakit">{{$user->riwayat_penyakit}}</textarea>
                            </div>
                        </div>
                    @elseif(session()->get('role')=="pemandu")
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nomor Rekening" name="no_rekening" onkeyup="numOnly(this)" value="{{$user->no_rekening}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bank</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Bank" name="bank" value="{{$user->bank}}" required>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="image">
                            <small>Masukan foto jika ingin mengubahnya</small>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{session()->get('id')}}">
                    <input type="hidden" name="role" value="{{session()->get('role')}}">
                    <input type="submit" class="btn btn-primary btn-block" value="Ubah">
                </form>
            </div>
        </div>

@endsection

@section('script')
@endsection

