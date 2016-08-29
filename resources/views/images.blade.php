@extends('app-user')

@section('content')
@include('messages')
 <div class="home_page"><a href="{{action('UsersController@getDashboard')}}"><span class="glyphicon glyphicon-home hom1"></span></a></div>
 <a href="{{action('UsersController@getLogOut')}}" class="span"><span class='glyphicon glyphicon-log-out out1'>LogOut</span></a>
  <div class="cont_img">
    
        {!! Form::open(['action' => ['ImagesController@postUploadImage'], 'method' => 'POST','class' => 'form-horizontal', 'role' => 'form', 'files' => 'true' ]) !!}
            <input type="file" name="image" style="margin-top:20px; ">
            <input type="submit" value="Upload Image" name="upload" class="btn btn-info" style="margin-top:20px;">
        {!! Form::close() !!}
  </div>
  @foreach($images as $image)
    <div style='width:25%; float:left;margin-left:5px;margin-top:15px;position:relative'>
        <span class="glyphicon glyphicon-trash trash"></span>
      	<img src="/Uploads/images/{{$image->image}}"  class='img-rounded img1' style="width:75%;">
      	<p style="font-size:25px; margin-left:10px;margin-top:10px;"> {{$image->fromUser->first_name}} {{$image->fromUser->last_name}}</p>	
    </div> 
  @endforeach  

@endsection