@extends('index')
@section('title','Admin')
@section('content')

{{-- Product --}}
@foreach($phones as $value)
	
	<div class="col-xs-6 col-md-3 col-sm-4">
			    <a href="{{route('show',$value['id'])}}" class="thumbnail">
			      <img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
			      {{$value['name']}}
			{{$value['cost']}}
			    </a>
			</div>
	<div class="col-xs-6 col-md-3 col-sm-4">
			    <a href="{{route('show',$value['id'])}}" class="thumbnail">
			      <img class="img-responsive" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
			      {{$value['name']}}
			{{$value['cost']}}
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
