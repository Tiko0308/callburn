@extends('app-user')

@section('content')
<div class="container">
	<a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
    <div class="cont_1" >
	    @if(empty($User->images))
      		<img src="/images/1.jpg"  class='img-rounded'>
      	@else
      		<img src="/Uploads/{{$User->images}}"  class='img-rounded'>	
      	@endif
	</div>
    <div class="cont_2"><p>{{$User->first_name}}</p></div>
    <div class="cont_3"><p>{{$User->last_name}}</p></div>
	<div class="cont_5"><a href="{{action('UsersController@getChat',$User->id)}}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-envelope"></span> Send Message </a></div>
</div>  
@endsection