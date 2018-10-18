
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
				<th>Tên sản phẩm:</th>
				<th>Màu sắc:</th>
				<th>Số lượng:</th>
				<th>Thành tiền(₫):</th>
				<th>Xóa</th>
				<th>Xem</th>
			</thead>
		@foreach($billDetail as $value)
			<tbody>
				<td>{{$value->name}}</td>
				<td>{{$value->color}}</td>
				<td>{{$value->number}}</td>
				<td>{{number_format($value->cost)}}</td>
				<td><a href="{{route('rmBillD',$value['id'])}}">Xóa đơn hàng.</a></td>
				<th><a href="{{route('show',$value['id_phone'])}}">Xem chi tiết.</a></th>
			</tbody>
		@endforeach

		</table>
		</div>


		<div class="col-md-12 col-sm-12">
		
			<div class="col-md-8 col-sm-5" style="padding:0px;">
				<h3>Tổng hóa đơn:</h3>
			</div>
			<div class="col-md-4 col-sm-5" style="padding:0px;">
				<h3 class="text-right">{{number_format($cost)." đồng"}}</h3>
			</div>
		</div>


{{-- Form Info --}}

<div class="col-md-12 col-sm-12"></div>

@if(($billDetail->count() != 0) && ($status == 0))
		<legend>Nhập thông tin khách hàng</legend>
		<form id="myform" action="{{route('postBill')}}" method="post" class="form-horizontal">
			@csrf
			<div id="dvErName" class="col-md-offset-2 col-md-10" style="color: red;"></div>
			<div id="dvName" class="form-group" >
				<label class="col-md-2">Nhập tên *:</label>
				<div class="col-md-10">
					<input id="ipName" class="form-control" type="text" name="name" required>
				</div>
			</div>
			<div id="dvErSdt" class="col-md-offset-2 col-md-10"style="color: red;"></div>
			<div id="dvSdt" class="form-group" >
				<label class="col-md-2">Số điện thoại *:</label>
				<div class="col-md-10">
					<input id="ipSdt" class="form-control" type="text" name="phone_number" placeholder="Ít nhất 10 số." required>
				</div>
			</div>
			<div id="dvErAdd" class="col-md-offset-2 col-md-10" style="color: red;"></div>
			<div id="dvAdd" class="form-group" >
				<label class="col-md-2">Địa chỉ *:</label>
				<div class="col-md-10">
					<input id='ipAdd' class="form-control" type="text" name="address" placeholder="Không cần nếu nhận tại cửa hàng." required>
				</div>
			</div>
			
			<div class="form-group" >
				<div class="col-md-2">
					<label>Phương thức:</label>
				</div>
				<div class="col-md-10">
					<label class="radio-inline" >
						<input  checked="checked" id="ipHome" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">:Tại nhà
					</label>
					<label class="radio-inline">
						<input type="radio" id="ipShop" name="inlineRadioOptions" id="inlineRadio3" value="option3">:Tại cửa hàng
					</label>
				</div>
			</div>
		{{-- 	<div class="form-group has-error">
  <input type="text" class="form-control" id="inputError1">
</div> --}}
 			<button  id="btn" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				  Xác nhận.
				</button>
		</form>
@elseif($status == 1)
	<div class="col-md-12">
		<h2>Đã thanh toán!! Cảm ơn đã mua hàng</h2>
	</div>

@endif
</div>	
		
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xác nhận đơn hàng.</h4>
      </div>
      <div class="modal-body">
        	<table class="table table-striped">
				<tr>
					<td>Tên khách hàng:</td>
					<td><b id="name"></b></td>
				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td><b id="sdt">	</b></td>
				</tr>
				<tr>
					<td colspan="2">Địa chỉ giao hoặc nhận hàng:</td>
				</tr>

				<tr>
					<td colspan="2" class="text-right"><b id="add">	</b></td>
					
				</tr>
				<tr>
					<td>Hóa Đơn:</td>
					<td>{{number_format($cost)." đồng"}}</td>
				</tr>
			</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button form="myform" type="submit" class="btn btn-primary">Thanh toan</button>
      </div>
    </div>
  </div>
</div>	

{{-- script --}}
	<script>
		$('#menu2').addClass( "active" );
		$('#ipShop').click(function(){
			$('#ipAdd').removeAttr('required');
			$('#ipAdd').attr('disabled','disabled');
		});
		$('#ipHome').click(function(){
			$('#ipAdd').attr('required','required');
			$('#ipAdd').removeAttr('disabled','disabled');
		});

		$('#btn').click(function(){
				var check = 0;
				var add = "Tầng 8 thư viện Tạ Quang Bửu, đại học Bách Khoa, số 1 Đại Cồ Việt, quận Hai Bà Trưng, Tp Hà Nội.";
				//check name input
				if (!$('#ipName').val()) {
					check = 1;
					$('#dvName').addClass('has-error');
					$('#dvErName').text('Mời nhập tên.');
				}

				//check phone number input
				if (!$('#ipSdt').val()) {
					check = 1;
					$('#dvSdt').addClass('has-error');
					$('#dvErSdt').text('Mời nhập số điện thoại.');
					
				}else if (isNaN( $("#ipSdt").val() )){
					check = 1;
					$('#dvSdt').addClass('has-error');
					$('#dvErSdt').text('Nhập sai.');
				}else if ($("#ipSdt").val().length < 10) {
					check = 1;
					$('#dvSdt').addClass('has-error');
					$('#dvErSdt').text('Số điện thoại không hợp lệ(thiếu số).');
				}

				//check addres input
				if ($('#ipAdd').attr('disabled')=='disabled') {
					$('#add').text(add);
				}else if (!$('#ipAdd').val()) {
					check = 1;
					$('#dvAdd').addClass('has-error');
					$('#dvErAdd').text('Mời nhập địa chỉ.');
					
				}
				if (check==1) {
					return false;
				}
				
				$('#name').text($('#ipName').val());
				$('#sdt').text($('#ipSdt').val());
				$('#add').text($('#ipAdd').val());
				
		});
	</script>

@endsection