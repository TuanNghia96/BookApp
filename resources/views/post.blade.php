@extends('index')
@section('title','Post')

@section('content')

<form action="{{route('post')}}" method="post">
	@csrf
		<legend>Thông tin đến người quản trị.</legend>

	<table class="table table-bordered table-hover">
		<tr>
			<td><label for="">Nội dung</label></td>
			<td class="td-input"><textarea name text class="form-control" id="" placeholder="Input field" style=" height: 60px; "></textarea></td>

		</tr>
		<tr>
			<td><label for="">Tên:</label></td>
			<td class="td-input" ><input type="text" class="form-control" id="" placeholder="Input field"name="name"></td>
		</tr>
		<tr>
			<td><label for="">Email</label></td>
			<td class="td-input"><input type="text" class="form-control" id="" placeholder="Input field"name="email"></td>
		</tr>
		<tr>
			<td  colspan="2"><button type="submit" class="btn btn-primary">Gửi.</button></td>
		</tr>
	</table>
</form>


{{-- <form action="{{route('post')}}" method="post">
	<legend>Form title</legend>
	@csrf
	<div class="form-group">
		<label for="">label</label>
		<input type="text" class="form-control" id="" placeholder="Input field">
	</div>

	

	<button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

	<script>
		$('#menu4').addClass( "active" );
	</script>

@endsection