@extends('app-user')

@section('content')

<div class="container">
  <h2 class="hed">This is a user edit container!!</h2>
  <form class="form-horizontal" action="{{action('AdminsController@postUpdateUser',$OneUser->id)}}" method="post">
  	<div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Id:</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput"  type="text" value="{{$OneUser->id}}" disabled>
      </div>
    </div>
    <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Email:</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput"  type="text" value="{{$OneUser->email}}" disabled>
      </div>
    </div>
    <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="color:black;">First_name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="first_name" >
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" style="color:black;">Last_name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="last_name" >
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="save">Save</button>
      </div>
    </div>
  </form>
</div>
  @if(Session::has('error'))
      <div class='col-md-12'>
        <div class="col-sm-9">
          <div class="alert alert-success">
            {{Session::get('error')}}
          </div>
        </div>
      </div>
      @endif
	
@endsection