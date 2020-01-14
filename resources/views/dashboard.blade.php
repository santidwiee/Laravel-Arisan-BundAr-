<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>BundAr</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="icon" href="{{asset('frontend/img/logo.png')}}"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/colors.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
</head>
<body class="seo_version">

	<!-- LOADER -->
	<div id="preloader">
		<div id="cupcake" class="box">
			<span class="letter">L</span>
			<div class="cupcakeCircle box">
				<div class="cupcakeInner box">
					<div class="cupcakeCore box"></div>
				</div>
			</div>
			<span class="letter box">A</span>
			<span class="letter box">D</span>
			<span class="letter box">I</span>
			<span class="letter box">N</span>
			<span class="letter box">G</span>
		</div>
	</div>
	<!-- END LOADER -->
	
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="{{asset('frontend/img/logo1.png')}}" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right hidden-md hidden-sm hidden-xs">
        
                    </ul>
                    <ul class="nav navbar-nav navbar-right menu-top">
                        @guest
                        <li><a class="active" data-toggle="modal" data-target="#modalLogin" href="#"><i class="fa fa-angle-double-down"></i>   Masuk</a></li>
                        <li><a data-toggle="modal" data-target="#modalRegis" href="#"><i class="fa fa-angle-double-up"></i>   Daftar</a></li>
                        @else
                        <br>
                        <li><a class="active" href="#">{{auth()->user()->name}}</a></li>
                        <li><a href="#"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-angle-double-right"></i>
                            Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> 
                        </li>
                        @endguest
                    

                        <li><a href="{{route('arisan.index')}}">Daftar Arisan</a></li>
                        <li><a href="{{route('anggota.index')}}">Daftar Anggota</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4" style="background-image:url('uploads/parallax_12.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="big-tagline">
                        <h2>Bunda Arisan<br> Mengolah Arisan Sesuai KeinginanMu</h2>
                        <p class="lead">Anda bisa menjadi admin arisan yang terpercaya
                            Pengolahan Terbaik</p>
                        <a href="#support" class="btn btn-light btn-radius btn-brd ban-btn">Kontak Kami</a>
                    </div>
                </div>

                <div class="app_iphone_02 wow slideInUp hidden-xs hidden-sm" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{asset('frontend/img/ikon_besar.png')}}" alt="" class="img-responsive">
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <svg id="clouds" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 85 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>

    <div id="about" class="section wb nopadtop">    
        <div class="container">
            <div class="section-title text-center">
                <h3>Masih Zaman Kocok Manual???</h3>
                <p class="lead">Arisan dengan pengocokan secara sistem. Kami membantu Anda mengolah arisan.</p>
            </div><!-- end title -->
        </div>

        <section class="section nopad cac text-center">
            <a href="#"><h3>Menarik dan Mudah</h3></a>
        </section>

        <hr class="hr1">

        <div class="container">			
			<div class="section-title text-center">
                <h3>Fitur BundAr</h3>
                <p class="lead">Tambah Arisan dan Anggota Anda. Perekapan laporan pembayaran tiap anggota tanpa perlu kertas lagi.</p>
            </div><!-- end title -->
			
			<div class="seo-services row clearfix">
                <div class="col-md-3 col-sm-6 col-xs-12">
					<div class="who">
                    <img src="{{asset('frontend/img/ikon4.png')}}" alt="icon" class="wow fadeInUp">
						<h4>Tambah Anggota</h4>
						<p class="lead">Isikan nama, alamat, dan nomor telpon atau handphone Anggota</p>
					</div>
                </div><!-- end col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
					<div class="who">
						<img src="{{asset('frontend/img/ikon1.png')}}" alt="icon" class="wow fadeInUp">
						<h4>Tambah Arisan</h4>
						<p class="lead">Isikan nama, kapasitas, nominal yang perlu dibayar, dan deskripsi arisan yang anda inginkan</p>
					</div>
                </div><!-- end col -->  

                <div class="col-md-3 col-sm-6 col-xs-12">
					<div class="who">
						<img src="{{asset('frontend/img/ikon2.png')}}" alt="icon" class="wow fadeInUp">
						<h4>Pengocokan Sistem</h4>
						<p class="lead">Daftar anggota yang sudah didaftarkan ke dalam arisan maka akan dirandom secara acak</p>
					</div>
                </div><!-- end col --> 
                
                <div class="col-md-3 col-sm-6 col-xs-12">
					<div class="who">
						<img src="{{asset('frontend/img/ikon3.png')}}" alt="icon" class="wow fadeInUp">
						<h4>Laporan Pembayaran</h4>
						<p class="lead">Setiap anggota pada arisan yang akan membayar arisan akan dilaporkan lunas</p>
					</div>
                </div><!-- end col -->
            </div><!-- end how-its-work -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="support" class="section db">
        <div class="container">
        </div><!-- end container -->
    </div><!-- end section -->

    <svg id="clouds1" class="hidden-xs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 85 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>

	<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li>Jln.Pedongkelan Belakang RT.10/RW.13 No.64, Jakarta Barat</li>
                            <li>+62 877 8387 7604</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Social</h3>
                        </div>
                        <ul class="footer-links social-md">
                            <li><a class="fb" href="#"><i class="fa fa-facebook"></i>Bundar</a></li>
                            <li><a class="tw" href="#"><i class="fa fa-twitter"></i>@bundar</a></li>
                            <li><a class="pi" href="#"><i class="fa fa-google"></i>bundar@gmail.com</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                </div><!-- end col -->

                <div class="col-md-2 col-sm-2 col-xs-12">
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
	
    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-company-name">copyrights &copy; 2020 <a href="#">BundAr</a> oleh : <a href="#">Santi Dwi Agustin</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!--SignIn Modal HTML -->
<div id="modalLogin" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        <b>Masuk Akun</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <a class="blue" href="#">Lupa Password?</a><br> --}}
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End signIn modal -->


<!--SignUp Modal HTML -->
<div id="modalRegis" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        <b>Buat Akun</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="checkbox">
                                                     
                        <label>
                        <input type="checkbox" /> <strong>Saya Setuju</strong> dengan apapun aturan BundAr
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End SignUp Modal -->

    <!-- ALL JS FILES -->
    <script src="{{asset('frontend/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('frontend/js/custom.js')}}"></script>
</body>
</html>


{{-- DB_DATABASE=bundarxy_bundar
DB_USERNAME=bundarxy_bundar
DB_PASSWORD=@santi9897 --}}