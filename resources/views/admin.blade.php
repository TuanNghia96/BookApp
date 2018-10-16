@extends('index')
@section('title','HOME')
@section('content')

{{-- Product --}}
<legend>Trang chủ</legend>
@foreach($phones as $value)
	<div class="col-xs-6 col-md-3 col-sm-4">
		<a href="{{route('show',$value['id'])}}" class="thumbnail" style="text-decoration: none;">
	    	<label>{{$value['name']}}</label>
	    	<img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
	    	<p><hr></p>
	    	<span><h5 style="text-align: right;">{{number_format($value['cost'])}}	₫</h5></span>
    	
	    </a>
	</div>
	<div class="col-xs-6 col-md-3 col-sm-4">
		<a href="{{route('show',$value['id'])}}" class="thumbnail" style="text-decoration: none;">
	    	<label>{{$value['name']}}</label>
	    	<img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
	    	<p><hr></p>
	    	<span><h5 style="text-align: right;">{{number_format($value['cost'])}}₫</h5></span>
    	
	    </a>
	</div>
@endforeach


<div class=" col-md-12 text-center">
	{!!$phones->links()!!}    
</div>

	<script>
		$('#menu1').addClass( "active" );
	</script>
@endsection
