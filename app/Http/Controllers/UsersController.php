<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersCreaterequest;
use App\Contracts\UserInterface;
use Auth;

class UsersController extends Controller
{
	public function getIndex()
	{
		return view('login');
	}
	 
	public function postRegistration(UsersCreaterequest $request,UserInterface $userRepo)
	{
		$data = $request->inputs();
		$data['role'] = 'user';
		$user = $userRepo->getCreateUser($data);
		return redirect()->back()->with('error','Success');
	}
	public function postLogin(Request $request)
	{
		$data = $request->all();
		if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'role' => 'user'])) {
            return redirect()->action('UsersController@getDashboard');
        }else {
            return redirect()->back()->with('error_danger','Invalid Login or password');
        }
    }
	public function getDashboard()
	{
		return view('home');
	}
	public function getLogOut()
	{
		Auth::logout();
        return redirect()->action('UsersController@getIndex');
	}
}
