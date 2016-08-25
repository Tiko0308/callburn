@extends('app-user')

@section('content')
<section ng-controller="MessageController">
    <a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
	<div class="all_users"><p>This is your  Messages</p></div>
    <div class="chevron"><span class="glyphicon glyphicon-chevron-down down"></span></div>
	<div class="message">
		
		@foreach($data as $value)
			<div class='mess_me' style="padding-bottom:51px;">
				
			@if(empty($value->fromUsers->images))
      		  <img src="/images/1.jpg" style="float:left;margin-bottom:5px;"  class='img-circle img'>
      	    @else
      		<img src="/Uploads/{{$value->fromUsers->images}}" style="float:left;margin-bottom:5px;" class='img-circle img'>	
      	    @endif
      	    	<h4 style="color:black float:left;">{{$value->fromUsers->first_name}} {{$value->fromUsers->last_name}} </h4>
               <p class='text' style="float:left;" >{{$value['text']}}</p>
               <span style="float:left;margin-left:10px;margin-top:5px;">{{$value['created_at']}}</span>
			</div>	
		@endforeach
	
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