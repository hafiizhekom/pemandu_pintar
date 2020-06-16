@extends('layout.app')

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?=url('asset/logo.png')?>" class="w-100">
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex align-items-end flex-column">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                    </p>
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#ajukan-pendakian">Mulai Pendakian Anda</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3" id="pemandu-terpopuler">
                    <h3 class="text-center m-3">Pemandu Terpopuler</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-start mb-3">
                                @foreach($top_pemandu as $key => $value)
                                    <div class="p-1" style="width:20%;height:200px;">
                                        <img src="<?=url('upload/user/'.$value->foto)?>" class="w-100 h-100 border">
                                        <h5 class="text-center"><a href="<?=url('pendakian/pemandu/'.$value->id);?>">{{$value->nama_lengkap}}</a></h5>
                                    </div>
                                @endforeach
                            </div>
                            <a href="<?=url('pendakian/pemandu/all');?>" class="btn btn-link float-right">Lihat lainnya</a>
                        </div>
                    </div>
                </div>

                <div class="pt-3 pb-3" id="gunung-terpopuler">
                    <h3 class="text-center m-3">Gunung Terpopuler</h3>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-start mb-3">
                                @foreach($top_gunung as $key => $value)
                                    <div class="p-1" style="width:20%;height:200px;">
                                        <img src="<?=url('upload/gunung/'.$value->gambar)?>" class="w-100 h-100 border">
                                        <h5 class="text-center"><a href="<?=url('pendakian/gunung/'.$value->id);?>">{{$value->nama_gunung}}</a></h5>
                                    </div>
                                @endforeach
                            </div>
                            <a href="<?=url('pendakian/gunung/all');?>" class="btn btn-link float-right">Lihat lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('pendaki.modal_pendakian')

@endsection

@section('script')
@endsection
