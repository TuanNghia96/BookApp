@extends('index')
@section('title','Post')

@section('content')

{{-- form post --}}
<form action="{{route('post')}}" method="post">
	@csrf
		<legend>Thông tin đến người quản trị.</legend>

	<table class="table table-bordered table-hover">
		<tr>
			<td><label for="">Nội dung</label></td>
			<td class="td-input"><textarea name="text" text class="form-control" id="" placeholder="" style=" height: 60px;" required></textarea></td>

		</tr>
		<tr>
			<td><label for="">Tên:</label></td>
			<td class="td-input" ><input type="name" class="form-control" id="" placeholder=""name="name"></td>
		</tr>
		<tr>
			<td><label for="">Email</label></td>
			<td class="td-input"><input type="email" class="form-control" id="" placeholder=""name="email"></td>
		</tr>
		<tr>
			<td  colspan="2"><button type="submit" class="btn btn-primary">Gửi.</button></td>
		</tr>
	</table>
</form>
{{-- script --}}
	<script>
		$('#menu4').addClass( "active" );
	</script>

@endsection