<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsersCreaterequest;
use App\Contracts\UserInterface;
use App\Contracts\PostInterface;
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
     * Return  all users and posts dashboard view for admin.
     * GET /admin/dashboard
     * 
     * @param PostInterface $postRepo
     * @param UserInterface $userRepo
     * @return response
     */

	public function getDashboard(UserInterface $userRepo,PostInterface $postRepo)
	{
		$post = $postRepo->getAllPost();
		$users = $userRepo->getAllUsers();
		$data = [
			'users' => $users,
			'allPosts' =>$post
		];
		return view('admin.admin-dashboard',$data);	
	}
}