@extends('app-user')

@section('content')
<section ng-controller="MessageController">
    <a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
	<div class="all_users"><p>This is your  Messages</p></div>
    <div class="chevron"><span class="glyphicon glyphicon-chevron-down down"></span></div>
    <p style="padding-left:152px;margin-bottom:10px;font-size:21px; float:left">This is my sent messages</p>
    <p style="padding-left:443px;margin-bottom:10px;font-size:21px; float:left">This is me sent messages</p>
	<div class="message">
		
		@foreach($from as $value)
			<div class='mess_me' style="padding-bottom:51px;">
				
			@if(empty($value->toUsers->images))
      		  <img src="/images/1.jpg" style="float:left;margin-bottom:5px;"  class='img-circle img'>
      	    @else
      		<img src="/Uploads/{{$value->toUsers->images}}" style="float:left;margin-bottom:5px;" class='img-circle img'>	
      	    @endif
      	    	<h4 style="color:black float:left;">{{$value->toUsers->first_name}} {{$value->toUsers->last_name}} </h4>
               <p class='text' style="float:left;" >{{$value['text']}}</p>
               <span style="float:left;margin-left:10px;margin-top:5px;">{{$value['created_at']}}</span>
			</div>	
		@endforeach
	</div>	
	<div class="message">
		@foreach($to as $value1)
			<div class='mess_me' style="padding-bottom:51px;">
			@if(empty($value1->toUsers->images))
      		  <img src="/images/1.jpg" style="float:left;margin-bottom:5px;"  class='img-circle img'>
      	    @else
      		<img src="/Uploads/{{$value1->toUsers->images}}" style="float:left;margin-bottom:5px;" class='img-circle img'>	
      	    @endif
      	    	<h4 style="color:black float:left;">{{$value1->toUsers->first_name}} {{$value1->toUsers->last_name}} </h4>
               <p class='text' style="float:left;" >{{$value1['text']}}</p>
               <span style="float:left;margin-left:10px;margin-top:5px;">{{$value1['created_at']}}</span>
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