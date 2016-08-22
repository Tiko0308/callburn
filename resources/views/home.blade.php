@extends('app-user')

@section('content')
<div ng-controller="AngularController">
  <div class="container">
    <a href="{{action('UsersController@getLogOut')}}"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
    <h2  class="name"style="margin-right:20px;">{{Auth::user()->first_name}}</h2>
    <h2  class="name">{{Auth::user()->last_name}}</h2>
    <div class="panel panel-default">
      <div class="form-group">
        <span ng-show="errorMessage">@{{errorMessage}}</span>
  	 <form action="" method="post">   
  	    <input class="form-control form-control1" ng-model="name" id="inputdefault" type="text">
  	    <button type="button" ng-click="myFunc()"class="btn btn-primary">Add Post</button>
  	  </form>  
      </div>
      
    </div>
   </div>
  <div class="panel panel-default panel-left">
     
      <div class="panel-heading">
        <h3 style="color:Lightblue;text-align:center;border-bottom:1px solid lightblue;">Our Posts</h3>
        @foreach($OurPosts as $post)
          <div class="our_posts">
            <strong style="display:inline-block;">Post:</strong>
            <p class="post">{{$post->post}}</p><br>
            <strong style="display:inline-block;">Post_Time:</strong>
            <p class="post">{{$post->created_at}}</p>
          </div>
          
        @endforeach
       </div>
      
  </div>
</div>

@endsection
@section('script')
@endsection