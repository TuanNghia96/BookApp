{{-- @if(Session('date'))
	{{print_r($bill[0])}}
@endif --}}
@extends('index')
@section('title','Bill')
@section('content')
<?$i = 0;?>
{{-- Bills --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Đơn hàng #{{Session::get('id')}}:</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<th>Ten san pham:</th>
				<th>Mau sac:</th>
				<th>So luong:</th>
				<th>Thanh tien:</th>
				<th>Xoa</th>
				<th>xem</th>
			</thead>
		@foreach($billDetail as $value)
			<tbody>
				<td>{{$value->name}}</td>
				<td>{{$value->color}}</td>
				<td>{{$value->number}}</td>
				<td>{{$value->cost}}</td>
				<td><a href="{{route('rmBillD',$value['id'])}}">Xoa don hang.</a></td>
				<th><a href="{{route('show',$value['id_phone'])}}">Xem chi tiet.</a></th>
			</tbody>
		@endforeach

		</table>
		</div>


		
			<div class="col-md-8 col-sm-5" style="padding:0px;">
				<h3>Tổng hóa đơn:</h3>
			</div>
			<div class="col-md-4 col-sm-5" style="padding:0px;">
				<h3 class="text-right">{{$cost." đồng"}}</h3>
			</div>
	

		<form action="{{route('postBill')}}" method="post" class="form-horizontal">
			@csrf
			<div class="form-group" >
				<label class="col-md-2">Ten khac hang</label>
				<div class="col-md-10">
					<input class="form-control" type="text" name="name" required>
				</div>
			</div>
			<div class="form-group" >
				<label class="col-md-2">So dien thoai.</label>
				<div class="col-md-10">
					<input class="form-control" type="text" name="phone_number" required>
				</div>
			</div>
			<div class="form-group" >
				<label class="col-md-2">Dia chi</label>
				<div class="col-md-10">
					<input class="form-control" type="text" name="address" required>
				</div>
			</div>
			<div class="col-md-offset-2 col-md-10">
				<label class="radio-inline" >
					Tại nhà:<input  checked="checked" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
				</label>
				<label class="radio-inline">
					Tại cửa hàng:<input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
				</label>
			</div>





			<button type="submit" class="btn btn-primary">Thanh toan</button>

		</form>

		
	</div>
</div>
	<script>
		$('#menu2').addClass( "active" );
	</script>

@endsection