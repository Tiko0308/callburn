@extends('app-user')

@section('content')
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
	        <td><span class="glyphicon glyphicon-edit"></span></td>
	        <td><span class="glyphicon glyphicon-trash"></span></td>
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
            <td><span class="glyphicon glyphicon-edit"></span></td>
            <td><span class="glyphicon glyphicon-trash"></span></td>
          </tr>
         @endforeach 
      
    </tbody>
</table>



@endsection