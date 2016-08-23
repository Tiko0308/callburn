<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersCreaterequest;
use App\Contracts\UserInterface;
use App\Contracts\PostInterface;
use Auth;
use Validator;

class UsersController extends Controller
{
	 
    /**
     * Create a new instance of AdminsController class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['getIndex','postRegistration','postLogin']]);
    }

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
	public function getDashboard(PostInterface $postRepo)
	{
        $post=$postRepo->getAllPost();
        $data=[
            'OurPosts'=> $post,
        ];
        return view('home',$data); 
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

     /**
     * Deleting  users by admin
     * Post /admin/dashboard
     * @param Request $request
     * @param UserInterface $userRepo
     * @return response
     */
     public function postDeleteUser(Request $request,UserInterface $userRepo)
     {
        $id = $request ->get('id');
        $result=$userRepo->postDeleteUsers($id);
     }

    
}
