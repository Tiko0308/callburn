@extends('app-user')

@section('content')

<div class="container">
  <a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
  <h2  class="name"style="margin-right:20px;">{{Auth::user()->first_name}}</h2>
  <h2  class="name">{{Auth::user()->last_name}}</h2>
  <div class="panel panel-default">
    <div class="form-group">
	 <form action="" method="post">   
	    <input class="form-control form-control1"  id="inputdefault" type="text">
	    <button type="button" class="btn btn-primary">Add Post</button>
	  </form>  
    </div>
    
  </div>
 </div>
<div class="panel panel-default panel-left">
   
    <div class="panel-heading">Our Posts </div>
    
</div>

@endsection()