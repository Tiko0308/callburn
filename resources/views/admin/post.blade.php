@extends('app-user')

@section('content')

<div class="container">
  <h2 class="hed">This is a post edit container!!</h2>
  <form class="form-horizontal" action="{{action('AdminsController@postUpdatePost',$OnePost->id)}}" method="post">
  	<div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Id:</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput"  type="text" value="{{$OnePost->id}}" disabled>
      </div>
    </div>
    <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Created_at:</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput"  type="text" value="{{$OnePost->created_at}}" disabled>
      </div>
    </div>
   <div class="form-group">
       <label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Updated_at:</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput"  type="text" value="{{$OnePost->updated_at}}" disabled>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" style="color:black;"> Add some Post:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  name="post" >
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