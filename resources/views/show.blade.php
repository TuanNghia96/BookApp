@extends('index')
@section('title','Show')


@section('content')

{{-- Product --}}
	<div class="col-md-3">
	<img width="220" height="220" float="left" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
	
	
	</div>
	<div class="col-md-8 col-md-offset-1">
		<h3>{{$phone['name']}}</h3>

		<p>Đánh giá:</p>

		<form method="post" action="{{route('adPhone')}}">
	@csrf
			<input type="hidden" name="id" value="{{$phone['id']}}">
			<input type="hidden" name="name" value="{{$phone['name']}}">
			<input type="hidden" name="cost" value="{{$phone['cost']}}">
		<div  float='right' class="col-md-12 " height="auto">
			
			<label>Nhập số lượng:</label>
			<button id="btnPlus" type="button">
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</button>
			<input float='left' width="20px" type="number" name="number" min="1" max="5" value="1" required>
	        <button id="btnMinus" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

	    </div>
	    <div class="col-md-12">
	    
	    	<label>Chon mau:</label>
	    	<select name="color">
				<option value="Black">Black</option>
	        	<option value="White">White</option>
	        	<option value="Red">Red</option>
	        	<option value="Blue">Blue</option>
				<option value="Yellow">Yellow</option>
			</select>	
	    </div>

	    <div id="ad_bill" class="col-md-12">
		    <input type="submit" value="Them vao gioi hang">
		</div>
	</form>
</div>
<button id="button">click</button>
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
		{{$phone['info']}}
	</div>
	<div class="col-md-12">
		<img height="220" float="left" src="https://st1.bgr.in/wp-content/uploads/2018/01/samsung-galaxy-A8-plus-review-rear-camera.jpg">
	</div>
</div>

<script>

	$('#button').click(function(){
				alert("nghia");
			});

</script>
@endsection