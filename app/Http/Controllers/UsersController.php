<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersCreaterequest;
use App\Contracts\UserInterface;
use Auth;

class UsersController extends Controller
{
	 /**
     * login and registration page view.
     * GET /user
     *
     * @return response
     */
	public function getIndex()
	{
		return view('login');
	}
	 /**
     * Registration 
     * Post /user/registration
     * @param UsersCreaterequest $request 
     * @param UserInterface $userRepo
     * @return response
     */
	public function postRegistration(UsersCreaterequest $request,UserInterface $userRepo)
	{
		$data = $request->inputs();
		$data['role'] = 'user';
		$user = $userRepo->getCreateUser($data);
		return redirect()->back()->with('error','Success');
	}
	/**
     * Login 
     * Post /user/login
     * @param Request $request
     * @return response
     */

	public function postLogin(Request $request)
	{
		$data = $request->all();
		if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'role' => 'user'])) {
            return redirect()->action('UsersController@getDashboard');
        }else {
            return redirect()->back()->with('error_danger','Invalid Login or password');
        }
    }

     /**
     * Return dashboard view for user.
     * GET /user/dashboard
     *
     *
     * @return response
     */

	public function getDashboard()
	{
		return view('home');
	}

	/**
     * logout user
     * GET /user/log-out
     * 
     * @return response
     */
	
	public function getLogOut()
	{
		Auth::logout();
        return redirect()->action('UsersController@getIndex');
	}
}
