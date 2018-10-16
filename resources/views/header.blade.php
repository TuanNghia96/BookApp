{{-- header --}}
<div id ="header" style="">
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('home')}}">HUST phone shop</a>
		</div>

<div id="search" class="col-md-offset-4">

<form class="navbar-form navbar-collapse" action="{{route('postSearch')}}" method="post">
	 	@csrf
    <div class="row">
            <div class="input-group col-md-6">
                <input type="text" class="form-control" name="name" id="inputPassword2" placeholder="tìm điện thoại">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Tìm kiếm.</button>
                </span>
            </div>

    </div>
</form>

</div>





{{-- 		<form class="form-inline" action="{{route('postSearch')}}" method="post">
	
<div class="form-group">
<input type="text" class="form-control" name="name" id="inputPassword2" placeholder="tìm điện thoại">
</div>
</form> --}}

	</nav>
</div>