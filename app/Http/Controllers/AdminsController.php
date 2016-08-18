<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsersCreaterequest;
use App\Contracts\UserInterface;
use Auth;

class AdminsController extends Controller
{
	/**
     * login  page view.
     * GET /admin
     *
     * @return response
     */

	public function getIndex()
	{
		return view('admin.login'); 
	}

	/**
     * Login 
     * Post /admin/login
     * @param Request $request
     * @return response
     */

	public function postLogin(Request $request)
	{
		$data = $request->all();
		if(Auth::attempt(['email' => $data['username'], 'password' => $data['password'],'role' => 'admin'])) {
            return redirect()->action('AdminsController@getDashboard');
        }else {
            return redirect()->back();
        }
	}

	/**
     * Return dashboard view for admin.
     * GET /admin/dashboard
     *
     *
     * @return response
     */

	public function getDashboard(UserInterface $userRepo)
	{
		$users = $userRepo->getAllUsers();
		$data = [
			'users' => $users,
		];
		return view('admin.admin-dashboard',$data);	
	}
}