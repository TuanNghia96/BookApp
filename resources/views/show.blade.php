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
		    <div class="col-md-12">
			    <label for="ex1">Nhập số lượng:</label>
			</div>
			<div class="col-md-1">
				<button id="btnMinus" type="button" class="btn btn-default" aria-label="Left Align" disabled>
				  <span class="lyphicon glyphicon-minus" aria-hidden="true"></span>
				</button>
			</div>
			<div class="col-md-2">
			    <input float='left' id="ipNumber" width="20px" type="number" name="number" min="1" max="5" class="form-control" value="1" required readonly >
			</div>
				<button id="btnPlus" type="button" class="btn btn-default" aria-label="Left Align">
				  <span class="lyphicon glyphicon-plus" aria-hidden="true"></span>
				</button>


	    </div>
	    <div class="col-md-12">
	    <div class="col-md-4">
	    
	    	<label>Chon mau:</label>
	    	<select name="color" class="form-control">
	    		{{-- <option>--chọn màu--</option> --}}
				<option value="Black">Màu Đen</option>
	        	<option value="White">Màu Trắng</option>
	        	<option value="Red">Màu Đỏ</option>
	        	<option value="Blue">Màu Xanh</option>
				<option value="Yellow">Màu Vàng</option>
			</select><br>

	    </div>
	</div>
	    <div id="ad_bill" class="col-md-4" >
	    	<button type="submit" class="btn btn-primary" aria-label="Left Align">
				<span class="" aria-hidden="true">Thêm vào giỏ hàng.</span>
			</button>
		</div>
@if($check != 0)
			<button type="submit" class="btn btn-info" aria-label="Left Align" disabled>
				<span class="" aria-hidden="true">Đã có.</span>
			</button>

@endif	
		
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