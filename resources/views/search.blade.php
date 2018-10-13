
@extends('index')
@section('title','Search')
@section('content')
<?php
if (isset($_COOKIE['date'])) {
	echo $_COOKIE['date'];
}
$i=0;
foreach ($phones as $value) {
	$i++;
}
?>

{{-- search-bar --}}
	<legend>Tìm kiếm sản phẩm.</legend>

	<form class="form-inline" action="{{route('postSearch')}}" method="post">
		@csrf
		  <div class="form-group">
		    <label>Theo tên:</label>
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" name="name" id="inputPassword2" placeholder="tên điện thoại">
		  </div>
		  <div class="form-group">
		    <label>Theo loại:</label>
		  </div>
		  <div class="form-group">
		  	<select name="type" class="form-control">
				<option value="">Tat ca</option>
				<option value="iphone">Iphone</option>
				<option value="samsung">SamSung</option>
				<option value="oppo">Oppo</option>
				<option value="nokia">Nokia</option>
			</select>

		  </div>
		  <div class="form-group">
		    <label>Theo giá:</label>
		  </div>
		  <div class="form-group">
		  	<select name="cost" class="form-control">
				<option value="">Tat ca</option>
				<option value="0-2">Duoi 2 trieu</option>
				<option value="2-4">2 den 4 trieu</option>
				<option value="4-8">4 den 8 trieu</option>
				<option value="8-">tren 8 trieu</option>
			</select>

		  </div>
		  <button type="submit" class="btn btn-primary">Tìm kiếm.</button>


	<div class="seating">
	@if(isset($request))
		<div class="col-sm-12" style=" margin:10px;">
		@foreach($request as $key => $value)
			<span class="label label-default">{{$key}}</span>
			{{-- <div id="item-key">{{$key}}</div> --}}
			<span class="label label-primary">{{$value}}</span>
			{{-- <div id="item-value">{{$value	}}</div> --}}
		@endforeach
	</div>
		<div class="col-md-12">
			<p>Tìm thấy {{$i}} sản phẩm</p>
		</div>
		
		
		</div>
	@endif
	</div>

	<ul class="homeproduct" style="list-style: none;">
	@foreach($phones as $value)
		<div class="col-xs-4 col-md-3 col-sm-4">

			    <a href="#" class="thumbnail">
			    	<h4>{{$value['name']}}</h4>
			      <img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
			{{$value['cost']}}
			    </a>
		</div>
	@endforeach
	<script>
		$('#menu3').addClass( "active" );
	</script>


@endsection