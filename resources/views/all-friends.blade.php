@extends('app-user')

@section('content')

<div class="container">
	<a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
	<div class="all_users"><p>This is your  friends</p></div>
   <div class="chevron"><span class="glyphicon glyphicon-chevron-down down"></span></div>
 @foreach($allFriends as $friend)
    <div style='width:25%;height:250px;float:left;margin-left:30px;margin-top:20px;'>
    	@if(empty($friend->images))
      		<img src="/images/1.jpg"  class='img-rounded'>
      	@else
      		<img src="/Uploads/{{$friend->images}}"  class='img-rounded'>	
      	@endif
      	<a href="{{action('UsersController@getOneFriend',$friend->id)}}" class="friend">{{$friend->first_name}} {{$friend->last_name}}</a><br>
        
    </div>  
 @endforeach   
</div>
@endsection