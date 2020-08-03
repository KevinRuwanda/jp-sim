<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<title>Monster-Wifi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

 {{--    <script src="https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css" type="text/css"> --}}

    @yield('style')
</head>

<body>

	<div class="header-nav">
		<div class="header-nav-bottom">
			<div class="grup-all">
				<div class="nav-top">
					<!-- <div class="head-title">
					<p>Selamat Datang di</p>
				</div> -->
					<!-- <div class="right-contact">
					<!- <ul>
						<li><a href="#!">About</a></li>
						<li><a href="#!">Contact</a></li>
					</ul> -->
					<!-- </div> -->
				</div>
				<div class="head-search-nav">
					<div class="head-title-nav">
						<a href="/">
							<h1>Monster-Wifi</h1>
						</a>
						<span style="font-size:30px;cursor:pointer;position: absolute;right: 4px;top: 28%;" onclick="openNav()">&#9776;</span>
					</div>
					<div class="right-side-nav">
						@if (Auth::check())
						@if (Auth::user()->role == 3)
						<a href="/pesanan" style="font-size: 23px;">
							<i class="fa fa-cart-plus" aria-hidden="true"></i>
							({{count(App\order::where('pemilik_id',Auth::user()->id)->where('status','proses')->get())}})
						</a>
						@endif
						@endif
					</div>
					@if (Auth::check())
					<div class="image-profile">
						<div class="img-profile-content">
							<img src="@if (Auth::user()->image == null) {{ asset('image/111.png') }} @else {{ asset('image/projek/'.Auth::user()->image) }} @endif" alt="">
							<p>{{Auth::user()->name}}</p>
						</div>
						<ul>
							@if (Auth::user()->role == 3)
							<!-- <li><a href="/pesanan">Pesanan</a></li> -->
							<li><a href="/transaksi-pembayaran">Transaksi</a></li>
							<li><a href="/history">Riwayat Pembelian</a></li>
							<li><a href="/setting/{{Auth::user()->id}}">Pengaturan</a></li>
							@endif
							@if (Auth::user()->role == 2)
							<!-- <li><a href="/pesanan">Pesanan</a></li> -->
							<!-- <li><a href="/transaksi-pembayaran">Transaksi</a></li>
					<li><a href="/history">Riwayat Pembelian</a></li>
					<li><a href="/setting/{{Auth::user()->id}}">Pengaturan</a></li> -->
							<li><a href="/pengiriman-pesanan-pekerja">Pengiriman</a></li>
							@endif
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									Keluar</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
							</li>
						</ul>
					</div>
					@endif
					<div class="sign-login-side-right">
						<div class="icon-cart">
							@if (Auth::check())
							@if (Auth::user()->role == 3)
							<a href="/pesanan" style="font-size: 20px;">
								<i class="fa fa-cart-plus" aria-hidden="true"></i> ({{count(App\order::where('pemilik_id',Auth::user()->id)->where('status','proses')->get())}})
							</a>
							@endif
							@endif
						</div>
						@if (Auth::check())
						<div class="image-profile-mobile">
							<div class="img-profile-content-mobile">
								<img src="@if (Auth::user()->image == null) https://www.gravatar.com/avatar/ @else {{ asset('image/projek/'.Auth::user()->image) }} @endif" alt="">
							</div>
							<div class="name-profile">
								<p>{{Auth::user()->name}}</p>
							</div>
							<ul>
								<li><a href="#!">Pengaturan</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										Keluar</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
								</li>
							</ul>
						</div>
						@endif
						{{-- @if (!Auth::check())
						<a href="{{ route('login') }}">
							<h3>Login</h3>
						</a>
						&nbsp; &nbsp; <a href="{{ route('register') }}">
							<h3>Register</h3>
						</a>
						@endif --}}
					</div>
				</div>
			</div>
		</div>
		<div class="menu-store">
			@if (Auth::check())
			<nav>
				<ul>
					<!-- <li><a href="/">Home</a></li>
				@if (Auth::check()) -->
					@if (Auth::user()->role == 1)
					<li>
						<a href="/produk">Produk</a>
					</li>
					@endif
					<!-- @endif -->
					@if (Auth::check())
					@if (Auth::user()->role == 1)
					<li><a href="#!">Pengguna</a>
						<ul>
							<li><a href="/pekerja">Pekerja</a></li>
							@if (Auth::user()->role == 1)
							<li><a href="/pembeli">Pembeli</a></li>
							@endif
						</ul>
					</li>
					@endif
					@if (Auth::user()->role != 1)
					<!-- <li><a href="#!">Pesanan</a>
					<ul>
						@if (Auth::user()->role != 2)
						<li><a href="/pesanan">Pesanan</a></li>
						<li><a href="/transaksi-pembayaran">Transaksi</a></li>
						<li><a href="/history">History</a></li>
						@else
						<li><a href="/pengiriman-pesanan-pekerja">Pengiriman</a></li>
						@endif
					</ul>
				</li> -->
					@else
					<li><a href="#!">Pesanan</a>
						<ul>
							<li><a href="/pembayaran-verifikasi">Transaksi</a></li>
							<li><a href="/pengiriman/pesanan">Pengiriman</a></li>
						</ul>
						@endif
						@endif
				</ul>
			</nav>
			@endif
		</div>
	</div>

    <!-- <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Home</a>
        <a href="#">Tambah Produk</a>
        <a href="#">Ikan Hias</a>
        <a href="#">Ikan Cupang</a>
        <a href="#">Pekerja</a>
        <a href="#">Pembeli</a>
        <a href="#">Pesanan</a>
        <a href="#">Transaksi</a>
        <a href="#">History</a>
    </div> -->

    @yield('content')

    <footer>
        {{-- <div>Copyright © Outshop. Dibuat dengan cinta oleh kelompok ... ntah kelompok berapa ini.</div> --}}
    </footer>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tinymcescript.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/lightbox.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
    @yield('script')
    <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>
