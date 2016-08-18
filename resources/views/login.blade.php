@extends('app-user')

@section('content')
    <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="">WebSiteName</a>
                </div>
                @if(Session::has('error_danger'))
                  <div class='col-md-12 error'>
                    <div class="col-sm-9 error_right">
                      <div class="alert alert-danger">
                        {{Session::get('error_danger')}}
                      </div>
                    </div>
                  </div>
                  @endif
                <ul class="nav navbar-nav navbar-right" style="margin-right:200px">
                <form action="{{action('UsersController@postLogin')}}" method="post">
	                  <div class="form-group" style="float:left;width:50%">
	                  <label for="email">Email:</label>
	                  <input type="email" class="form-control" name="email" placeholder="Enter email" style="margin-right:20px;" >
	                </div>
	                <div class="form-group" style="float:left;width:50%;" >
	                  <label for="pwd">Password:</label>
	                  <input type="password" class="form-control" name="password" placeholder="Enter password">
	                </div>
	                <div class="checkbox">
	                </div>
	                <button type="submit" class="btn btn-default btn-login" name="log">Login</button>
             	</form>
            </div>
                </ul>
              </div>
    </nav>
    @if($errors->has())
      <div class='col-md-12'>
        <div class="col-sm-9 ">
          <div class="alert alert-danger error3">
                @foreach ($errors->all() as $error)
                    {{ $error }}<BR>       
                @endforeach
            </div>
        </div>
      </div>
    @endif
    @if(Session::has('error'))
      <div class='col-md-12'>
        <div class="col-sm-9">
          <div class="alert alert-success">
            {{Session::get('error')}}
          </div>
        </div>
      </div>
      @endif
            <div class="container">
              <h2>Registration</h2>
              <form role="form" action="{{action('UsersController@postRegistration')}}" method="POST">
                <div class="form-group">
                    <div class="form-group ">
                   	 	<input type="text" class="form-control" name="first_name" placeholder="First_name">
                 	</div>
                  	<div class="form-group">
                    	<input type="text" class="form-control" name="last_name" placeholder="Last_name">
                  	</div>
                  	<div class="form-group">
                    	<input type="email" class="form-control" name="email" placeholder="Email">
                  	</div>
                  <div class="form-group">
                   		<input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                 </div>
                 <button type="submit" class="btn btn-default" name="reg">Registration</button>
               </form>   

@endsection