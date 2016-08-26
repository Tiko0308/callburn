@extends('app-user')

@section('content')
<section ng-controller="PostController">
  <a href="{{action('AdminsController@getLogOut')}}" class="span"><span class='glyphicon glyphicon-log-out'>LogOut</span></a>
  <div class="all_users"><p>This is all users</p></div>
   <div class="chevron"><span class="glyphicon glyphicon-chevron-down down"></span></div>
  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>First_name</th>
          <th>Last_name</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
      	@foreach($users as $user)
  	      <tr>
  	        <td>{{$user->id}}</td>
  	        <td>{{$user->first_name}}</td>
  	        <td>{{$user->last_name}}</td>
  	        <td><a href="{{action('AdminsController@getUser',$user->id)}}" style="color:black;"><i class="glyphicon glyphicon-edit edit" ></i></a></td>
  	        <td><i class="glyphicon glyphicon-trash delete"  data-toggle="modal" data-target="#deleteModal"   ng-click="deleteUser({{$user->id}})"></i></td>
  	      </tr>
  	     @endforeach 
        
      </tbody>
  </table>

  <div class="all_posts"><p>This is all Posts</p></div>
   <div class="chevron"><span class="glyphicon glyphicon-chevron-down down"></span></div>
  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Posts</th>
          <th>created_at</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
          @foreach($allPosts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->post}}</td>
              <td>{{$post->created_at}}</td>
              <td><a href="{{action('AdminsController@getPost',$post->id)}}" style="color:black"><i class="glyphicon glyphicon-edit edit"></i></a></td>
              <td><i class="glyphicon glyphicon-trash del" data-toggle="modal" data-target="#deleteModal"  ng-click="deletePost({{$post->id}})"></i></td>
            </tr>
           @endforeach 
        
      </tbody>
  </table>

<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Header</h4>
      </div>
      <div class="modal-body">
        <p>Are You sure do you want to delete post.</p>
      </div>
      <div class="modal-footer">
        <button type="button" ng-if="user" class="btn btn-danger"  ng-click="deleteFunc()" >Delete</button>
        <button type="button" ng-if="post" class="btn btn-danger"  ng-click="MyFunc()" >Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</section>

@endsection
@section('script')
@endsection