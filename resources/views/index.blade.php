<?php
if (isset($_COOKIE['date'])) {
    setcookie('date', date('Y-m-d H:i:s'), time() + 60);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chu | @yield('title')</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- bootrap --}}
<link rel="stylesheet" href= "css/bootstrap-theme.min.css">
<link rel="stylesheet" href= "css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

	<meta charset="utf-8">
</head>
<body>
	@include('header')

	{{-- @include('footer')	 --}}

<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-3 sidebar">
				@include('menu')
			</div>

			<div class="col-md-9 col-sm-12 content">
				<div class="" style=" padding:5px;">
					@yield('content')
				</div>
			</div>

		</div>
	</div>
</div>
{{-- @include('footer') --}}

{{-- script --}}
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>