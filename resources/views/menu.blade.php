{{-- menu --}}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Menu</h3>
	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li id="menu1" ><a href="{{route('home')}}">Trang chủ</a></li>
			<li id="menu2"><a href="{{route('getBill')}}">Đi đến giỏ hàng ({{Session::get('number')}})</a></li>
			<li id="menu3"><a href="{{route('getSearch')}}">Tìm kiếm sản phẩm</a></li>
			<li id="menu4"><a href="{{route('getPost')}}">Thông tin đến người quản trị</a></li>
			<li id="menu5"><a href="{{route('about')}}">Thông tin liên hệ</a></li>
		</ul>
	</div>
	
</div>
	
