{{-- header --}}
{{-- class="navbar navbar-inverse" data-spy="affix" data-offset-top="197" --}}
<nav class="navbar navbar-inverse navbar-static" data-spy="affix" data-offset-top="50">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>

			</button>
			<a class="navbar-brand" href="{{route('home')}}">HUST phone shop</a>
		</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class=""><a href="#">Link <span class="sr-only">(current)</span></a></li>
				<li><a href="{{route('getSearch')}}">Tìm kiếm sản phẩm</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Liên hệ<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Liên kết khách hàng.</a></li>
						<li><a href="{{route('about')}}">Giới thiệu website</a></li>
						<li><a href="{{route('about')}}">Thông tin liên hệ</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{route('getPost')}}">Thông tin đến người quản trị</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Dăng nhập( quản trị viên)</a></li>
					</ul>
				</li>
			</ul>
		{{-- search name phone	 --}}
			<form class="navbar-form navbar-left" action="{{route('postSearch')}}" method="post">
				@csrf
				<div class="input-group">
					<input type="text" class="form-control" name="name" id="inputPassword2" placeholder="Tên điện thoại">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default">Tìm kiếm.</button>
					</span>
				</div>
			</form>
		{{-- bill status --}}
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{{route('getBill')}}" style="margin-right: 30px;">
						<span class="glyphicon glyphicon-shopping-cart cart-icon" id="topActionCartNumber" style="margin-top: 15px;position: absolute;font-size:25px;left: 5px;" aria-hidden="true"></span>
					<span class="cart-num" id="topActionCartNumber" style="position: absolute;top: 6px;color:blue;background: white;border-radius: 100px;padding-right: 5px;padding-left: 5px;left: 21px;">{{Session::get('number')}}</span>
					</a>
				</li>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>