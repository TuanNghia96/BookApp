@extends('index')
@section('title','Show')

<link rel="stylesheet" href= "../css/bootstrap.min.css">

@section('content')

{{-- Product --}}
	<div>
	<img width="220" height="220" float="left" src="https://cdn.tgdd.vn/Products/Images/42/192001/samsung-galaxy-j6-plus-1-400x400.jpg">
	<img height="220" float="left" src="https://st1.bgr.in/wp-content/uploads/2018/01/samsung-galaxy-A8-plus-review-rear-camera.jpg">
	<img  height="220" float="left" src="https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/09/galaxy-j6-plus-ra-mat-3.jpg">
	</div>
	<div width='300px' >
		<div float='left' height="auto">
			<h3>{{$phone['name']}}</h3>
		</div>

	<form method="post" action="{{route('adPhone')}}">
	@csrf
			<input type="hidden" name="id" value="{{$phone['id']}}">
			<input type="hidden" name="name" value="{{$phone['name']}}">
			<input type="hidden" name="cost" value="{{$phone['cost']}}">
		<div id="choosenumber" float='right' height="auto">
			<label>Nhập số lượng</label>
	        <input float='left' type="number" name="number" min="1" max="5" value="1" required>
	    </div>
	    <div id="choosecolor">
	    	<label>Chon mau:</label>
	    	<select name="color">
				<option value="Black">Black</option>
	        	<option value="White">White</option>
	        	<option value="Red">Red</option>
	        	<option value="Blue">Blue</option>
				<option value="Yellow">Yellow</option>
			</select>	

	    <div id="ad_bill">
		    <input type="submit" value="Them vao gioi hang">
		</div>
	</form>
	
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
		<b>Thong tin chi tiet</b><br>
		{{$phone['info']}}
	</div>

@endsection