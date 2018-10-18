
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ | @yield('title')</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- bootrap --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href= "http://localhost/BookApp/public/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php
if (is_null(Session::get('id'))) {
     echo "<meta http-equiv='refresh' content='0;url=http://localhost/BookApp/public/home'>";
	}
?>
<style type="text/css">
	@media (min-width: 1200px) {
  .container {
    width: 1300px;
  }
}
.responsive-img{
width: 100%;
height: auto;
margin-left: 0px;
margin-right: 0px;
}
.carousel{
    background: #2f4357;
    margin-top: 0px;
}
.carousel .item{
    /*min-height: 280px;  Prevent carousel from being distorted if for some reason image doesn't load */
    width: 100%;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	/*margin: 10px;*/	
	margin-right: px;
	margin-left:px;
}
</style>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

	<meta charset="utf-8">
</head>
<body>
@include('header')
<section id="body" >
	<div class="container" >
		<div class="row" style="">
			<div class="col-md-3 sidebar">
				@include('menu')
				@include('item')
			</div>

			<div class="col-md-9 col-sm-12 col-xs-12">

				<div class="" style=" padding:5px;">
					@include('silde')
					@yield('content')

				</div>

			</div>
		</div>
	</div>
</section>
@include('footer')



</body>
</html>