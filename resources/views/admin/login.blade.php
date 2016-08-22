@extends('app-user')

@section('content')
	<nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="">Admin</a>
                </div>
                <ul class="nav navbar-nav navbar-right" style="margin-right:200px">
                <form action="{{action('AdminsController@postLogin')}}" method="post">
	                  <div class="form-group" style="float:left;width:50%">
	                  <label for="email">Username:</label>
	                  <input type="text" class="form-control" name="username" placeholder="Enter username" style="margin-right:20px;" >
	                </div>
	                <div class="form-group" style="float:left;width:50%;" >
	                  <label for="pwd">Password:</label>
	                  <input type="password" class="form-control" name="password" placeholder="Enter password">
	                </div>
	                <div class="checkbox">
	                </div>
	                <button type="submit" class="btn btn-default btn-login" name="login">Login</button>
             	</form>
            </div>
                </ul>
              </div>
    </nav>
    @if(Session::has('error_danger'))
	<div class='col-md-12'>
		<div class="col-sm-9">
			<div class="alert alert-danger">
				{{Session::get('error_danger')}}
			</div>
		</div>
	</div>
	@endif
    


@endsection