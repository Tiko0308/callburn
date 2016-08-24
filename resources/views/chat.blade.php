@extends('app-user')

@section('content')
<section ng-controller="MessageController">
    <a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
	<div class="all_users"><p>This is your  Messages</p></div>
    <div class="chevron"><span class="glyphicon glyphicon-chevron-down down"></span></div>
	<div class="message">

	</div>
	<div class="send">	
	  <form action="" method="post">
		<input type="textarea" name ="text" ng-model="name" class="form-control inp">
	    <input type ="buttom" value="Send"  ng-click="mesFunc({{$id}})" name= "send" class="btn btn-info btn1" >
	   </form>  
	   <span ng-show="Message">@{{Message}}</span>
	</div>   
</section>	 

@endsection