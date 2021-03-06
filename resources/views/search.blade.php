
@extends('index')
@section('title','Search')
@section('content')
<?php	
$i=0;
foreach ($phones as $value) {
	$i++;
}
?>



<legend>Tìm kiếm sản phẩm.</legend>

{{-- search-bar --}}
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
			<option value="">Tất cả</option>
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
			<option value="">Tất cả</option>
			<option value="0-2">Dưới 2 triệu</option>
			<option value="2-4">2 đến 4 triệu</option>
			<option value="4-8">4 đến 8 triệu</option>
			<option value="8-">trên 8 triệu</option>
		</select>

	  </div>
	  <div class="form-group text-center">
		  <button type="submit" class="btn btn-primary">Tìm kiếm.</button>
	  </div>
</form>

{{-- search status --}}

@if(isset($request))
	<div class="col-sm-12" style=" margin:10px;" >
	@foreach($request as $key => $value)
		{{-- <div style="margin-right: 5px;"> --}}
			<div class=" col-md-3 col-xs-12 " style="font-size: 17px;">
				<label class="label label-default" >{{$key}}</label>
				<label class="label label-primary" >{{$value}}</label>
			</div>
		{{-- </div> --}}
	@endforeach
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
		<legend style="font-size: 18px;">Tìm thấy {{$i}} sản phẩm</legend>
	</div>

@endif

{{-- search result --}}
<div style=" margin-top: 20px;">
@foreach($phones as $value)
	<div class="col-xs-6 col-md-3 col-sm-4">
		<a href="{{route('show',$value['id'])}}" class="thumbnail" style="text-decoration: none;">
	    	<label>{{$value['name']}}</label>
	    	<img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
	    	<p><hr></p>
	    	<span><h5 style="text-align: right;">{{number_format($value['cost'])}}₫</h5></span>
    	
	    </a>
	</div>
@endforeach
</div>
{{-- <div class=" col-md-12 text-center">
	{!!$phones->links()!!}    
</div> --}}

{{-- scritp --}}
<script>
	$('#menu3').addClass( "active" );
</script>


@endsection