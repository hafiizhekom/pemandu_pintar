<html>
    <head>
        <title>Pemandu Pintar</title>
        <link rel="shortcut icon" href="<?=asset("asset/favicon.ico");?>" type="image/x-icon">
        <link rel="stylesheet" href="<?=asset("vendor/bootstrap/css/bootstrap.min.css");?>">
        <link rel="stylesheet" href="<?=asset("vendor/bootswatch/bootstrap.min.css");?>">
        <script src="<?=asset("vendor/jquery/jquery-3.5.1.min.js");?>"></script>

    </head>
    <body>
        @if (\Session::has('errors'))
        <div class="alert alert-danger position-fixed fixed-bottom ml-5 mr-5 alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach (\Session::get('errors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="main">

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Pemandu Pintar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                @if (\Session::has('email'))
                    @if (\Session::get('role')==="pendaki")
                        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=url('dashboard');?>">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=url('pendakian');?>">Pendakian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=url('profile');?>">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=url('auth/signout');?>">Signout</a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    @if (\Session::get('role')==="pemandu")
                    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?=url('dashboard');?>">Daftar Pendaki</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=url('pemanduan');?>">Riwayat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=url('profile');?>">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=url('auth/signout');?>">Signout</a>
                            </li>
                        </ul>
                    </div>
                @endif
                @endif
            </nav>
            <div class="bg-default pt-3">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        <script>
            function numOnly(selector){
                selector.value = selector.value.replace(/[^0-9]/g,'');
            }
        </script>
        <script src="<?=asset("vendor/popper/popper.js");?>"></script>
        <script src="<?=asset("vendor/bootstrap/js/bootstrap.min.js");?>"></script>
        <script src="<?=asset("vendor/font-awesome/js/all.js");?>"></script>
        @yield('script')
    </body>

</html>
