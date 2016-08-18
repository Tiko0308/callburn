<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsersCreaterequest;
use App\Contracts\UserInterface;
use Auth;

class AdminsController extends Controller
{
	public function getIndex()
	{
		return view('admin.login'); 
	}

	public function postLogin(Request $request)
	{
		$data = $request->all();
		if(Auth::attempt(['email' => $data['username'], 'password' => $data['password'],'role' => 'admin'])) {
            return redirect()->action('AdminsController@getDashboard');
        }else {
            return redirect()->back();
        }
	}

	public function getDashboard(UserInterface $userRepo)
	{
		$users = $userRepo->getAllUsers();
		$data = [
			'users' => $users,
		];
		return view('admin.admin-dashboard',$data);	
	}
}