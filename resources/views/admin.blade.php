@extends('index')
@section('title','HOME')
@section('content')

{{-- Product --}}
@foreach($phones as $value)
	
	<div class="col-md-3  col-xs-6 ">
		<a href="{{route('show',$value['id'])}}" class="thumbnail" style="text-decoration: none;">
	    	<label>{{$value['name']}}</label>
	    	<img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
    	<p style="text-align: right;">{{$value['cost']}} đồng</p>
	    </a>
	</div>
	<div class="col-md-3  col-xs-6">
		<a href="{{route('show',$value['id'])}}" class="thumbnail" style="text-decoration: none;">
	    	<label>{{$value['name']}}</label>
	    	<img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
    	<p style="text-align: right;">{{$value['cost']}} đồng</p>
	    </a>
	</div>
@endforeach

<div class="col-md-offset-4 col-md-4 text-center">
{!!$phones->links()!!}
</div>

	<script>
		$('#menu1').addClass( "active" );
	</script>
@endsection
