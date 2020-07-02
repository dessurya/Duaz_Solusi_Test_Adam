<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Duaz Solusi</title>
	<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<style type="text/css">
		.clearfix{
			clear: both;
		}
		ul#navigation{
			margin-bottom: 30px;
		}
		ul#navigation li,
		ul#navigation li a {
			cursor: pointer;
		}
	</style>
</head>
<body style="background-color: rgb(160,160,160);">
	<div style="position: relative; width: 85%; margin: 20px auto; padding: 20px; background-color: white;">
		<center><h3>Duaz Solusi</h3></center>
		<hr>
		<ul id="navigation" class="nav nav-tabs">
			<li class="nav-item {{ Route::is('konsumen*') ? 'active' : '' }}">
				<a href="{{ route('konsumen.index') }}" class="nav-link {{ Route::is('konsumen*') ? 'active' : '' }}">Konsumen</a>
			</li>
			<li class="nav-item {{ Route::is('transaksi*') ? 'active' : '' }}">
				<a href="{{ route('transaksi.index') }}" class="nav-link {{ Route::is('transaksi*') ? 'active' : '' }}">Transaksi</a>
			</li>
		</ul>
		@yield('content')
	</div>

	<script type="text/javascript" src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
</body>
</html>