{{-- header --}}
<div id ="header" style="">
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('home')}}">HUST phone shop</a>
		</div>
				<div id="bill" class="nav navbar-nav navbar-right">
			<a href=""><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
		</div>
		<ul class="nav navbar-nav navbar-right">

			<li>
				<a href="{{route('getBill')}}" style="padding-right: 0px;">({{Session::get('number')}})</a>
			</li>
			<li>
				<a href="{{route('getBill')}}" style="margin-right: 30px;"><span class="glyphicon glyphicon-shopping-cart" style="font-size:25px;" aria-hidden="true"></span></a>
			</li>
			
			</ul>
		<div id="search" class="col-md-offset-5">

			<form class="navbar-form navbar-collapse" action="{{route('postSearch')}}" method="post">
				 	@csrf
			    <div class="row">
			            <div class="input-group col-md-5">
			                <input type="text" class="form-control" name="name" id="inputPassword2" placeholder="tìm điện thoại">
			                <span class="input-group-btn">
			                    <button type="submit" class="btn btn-default">Tìm kiếm.</button>
			                </span>
			            </div>

			    </div>
			</form>

		</div>


{{-- 		      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> --}}
	</nav>
</div>