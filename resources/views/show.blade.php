@extends('index')
@section('title','Show')


@section('content')

{{-- Product --}}
	<div class="col-md-3">
	<img width="220" height="220" float="left" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
	
	
	</div>
	<div class="col-md-8 col-md-offset-1">
		<div class="col-md-12">
			<h3>{{$phone['name']}}</h3>

		<p>Đánh giá:</p>
		</div>
		

		<form method="post" action="{{route('adPhone')}}">
	@csrf
			<input type="hidden" name="id" value="{{$phone['id']}}">
			<input type="hidden" name="name" value="{{$phone['name']}}">
			<input type="hidden" name="cost" value="{{$phone['cost']}}">
		<div  float='right' class="col-md-12 " height="auto">
			
			<label>Nhập số lượng:</label>
			<button id="btnMinus" type="button" disabled>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</button>
			<input float='left' id="ipNumber" width="20px" type="number" name="number" min="1" max="5" value="1" required readonly >
	        <button id="btnPlus" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

	    </div>
	    <div class="col-md-12">
	    
	    	<label>Chon mau:</label>
	    	<select name="color">
	    		<option>--chọn màu--</option>
				<option value="Black">Màu Đen</option>
	        	<option value="White">Màu Trắng</option>
	        	<option value="Red">Màu Đỏ</option>
	        	<option value="Blue">Màu Xanh</option>
				<option value="Yellow">Màu Vàng</option>
			</select><br>
			<button> </button>

	    </div>

	    <div id="ad_bill" class="col-md-12">
		    <input type="submit" value="Them vao gioi hang">
		</div>
	</form>
</div>
<div class="col-md-12">
	
	<h4>Thong tin dien thoai</h4>

	<div>
		<table>
			<tr>
				<td class='show'>Loai dien thoai:</td>
				<td class='show'>{{$phone['make']}}</td>
			</tr>
			<tr>
				<td class='show'>Kich co man hinh:	</td>
				<td class='show'>{{$phone['size']}}</td>
				
			</tr>
			<tr>
				<td class='show'>Can nang dien thoai:</td>
				<td class='show'>{{$phone['weigh']." gram"}}</td>
				
			</tr>
		</table>
		<div class="col-md-12"></div>
			<img  height="220" float="left" src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/09/galaxy-j6-plus-ra-mat-3.jpg">
		</div>
		<b>Thong tin chi tiet</b><br>
		<p>- Camera chính 13MP với f/2.2, tự động lấy nét, đèn flash kép LED, gắn thẻ địa lý, lấy nét cảm ứng, dò tìm khuôn mặt/nụ cười, HDR và camera mặt trước 2MP
			- Màn hình cảm ứng điện dung IPS LCD 12,7 cm (5 inch) với độ phân giải 1080 x 1920 pixel, mật độ điểm ảnh 441 ppi và hỗ trợ màu 16M
			- Android v6.0Marshmallow</p>
		{{-- {{$phone['info']}} --}}
	</div>
	<div class="col-md-12">
		<img height="220" float="left" src="https://st1.bgr.in/wp-content/uploads/2018/01/samsung-galaxy-A8-plus-review-rear-camera.jpg">
	</div>
</div>

<script>
	
	$('#btnPlus').click(function(){
		if ($('#ipNumber').val()<5) {
		var number =  Number($('#ipNumber').val())+1;
				$('#ipNumber').val(number);
				$('#btnMinus').removeAttr('disabled');
		}else {
			$('#btnPlus').attr('disabled','disabled');
		}
		});

	$('#btnMinus').click(function(){
		if ($('#ipNumber').val()==2) {
			var number =  Number($('#ipNumber').val())-1;
				$('#ipNumber').val(number);
				$('#btnMinus').attr('disabled','disabled');
		}


		if ($('#ipNumber').val()>2) {
			var number =  Number($('#ipNumber').val())-1;
				$('#ipNumber').val(number);
				$('#btnPlus').removeAttr('disabled');
		}

		
		
		});
</script>
@endsection