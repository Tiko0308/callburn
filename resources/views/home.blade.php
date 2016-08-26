@extends('app-user')

@section('content')
<div ng-controller="AngularController">
  <a href="{{action('UsersController@getLogOut')}}" class="span"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
  <div class="container">
    <div class="cont">
      @if(empty(Auth::user()->images))
      <img src="/images/1.jpg">
      @else
          <img src="/Uploads/{{Auth::user()->images}}" style="width:75%;" class='img-rounded'>
      @endif
        {!! Form::open(['action' => ['UsersController@postUploadImage'], 'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true' ]) !!}
            <input type="file" name="image" style="margin-top:20px; ">
            <input type="submit" value="Upload Image" name="sub" class="btn btn-info" style="margin-top:20px;">
        {!! Form::close() !!}
  </div>
    <div class="cont_1">
      <h2  class="name"style="margin-right:20px;">{{Auth::user()->first_name}}</h2>
      <h2  class="name">{{Auth::user()->last_name}}</h2>
    </div>  
    <div class="panel panel-default cont_2">
      <div class="form-group">
        <span ng-show="errorMessage">@{{errorMessage}}</span>
  	 <form action="" method="post">   
  	    <input class="form-control form-control1" ng-model="name" id="inputdefault" type="text">
  	    <button type="button" ng-click="myFunc()"class="btn btn-primary ad_but">Add Post</button>
  	  </form>  
      </div>
    </div>
    <div class="cont_3"><a href="{{action('UsersController@getFriends',Auth::user()->id)}}" class="my_fr"> My Friends</a></div> 
    <div class="cont_4"><a href="" class="my_img">Images</a></div>
  </div>
  <div class="panel panel-default panel-left">
     
      <div class="panel-heading">
        <h3 style="color:Lightblue;text-align:center;border-bottom:1px solid lightblue;">Our Posts</h3>
        @foreach($OurPosts as $post)
          <div class="our_posts">
            <strong style="display:inline-block;">Post from User:</strong>
            <p class="post">{{$post->fromUser->first_name}} {{$post->fromUser->last_name}}</p><br>
            <strong style="display:inline-block;">Post:</strong>
            <p class="post">{{$post['post']}}</p><br>
            <strong style="display:inline-block;">Post_Time:</strong>
            <p class="post">{{$post['created_at']}}</p>
          </div>
        @endforeach
       </div>
      
  </div>
</div>

@endsection
@section('script')
@endsection