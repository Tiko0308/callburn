@extends('app-user')

@section('content')
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



@endsection