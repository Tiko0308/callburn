<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsersCreaterequest;
use App\Http\Requests\Admin\UsersUpdaterequest;
use App\Http\Requests\Admin\PostUpdaterequest;
use App\Contracts\UserInterface;
use App\Contracts\PostInterface;
use Auth;

class AdminsController extends Controller
{

    /**
     * Create a new instance of AdminsController class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['getIndex','postLogin']]);
    }

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
           return redirect()->back()->with('error_danger','Invalid Login or password');
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

	/**
     * logout admin
     * GET /admin/log-out
     * 
     * @return response
     */
	public function getLogOut()
	{
		Auth::logout();
        return redirect()->action('AdminsController@getIndex');
	}

    /**
     * get one user for admin
     * GET /admin/user
     * 
     * @param UserInterface $userRepo
     * @return response
     */
	public function getUser($id,UserInterface $userRepo)
    {
        $user = $userRepo->getOneUser($id);
        $data = [
            'OneUser' => $user
        ];
        return view('admin.user',$data);
    }

    /**
    * update user 
    *
    * @param integer $id
    * @param UsersUpdaterequest $request
    * @param UserInterface $userRepo
    * @return response
    */
     public function postUpdateUser($id,UsersUpdaterequest $request,UserInterface $userRepo)
     {
        $data = $request->inputs();
        $user = $userRepo->postUpdateUser($id,$data);
        return redirect()->back()->with('error','Success');
     }

     /**
     * Get one  post for admin
     * Post /admin/one-post
     * @param Request $request
     * @param PostInterface $postRepo
     * @return response
     */
    public function getPost($id,PostInterface $postRepo)
    {
        $post = $postRepo->getOnePost($id);
        $data = [
            'OnePost' => $post
        ];
            return view('admin.post',$data);
    }

    /**
    * update post 
    *
    * @param integer $id
    * @param PostUpdaterequest $request
    * @param PostInterface $postRepo
    * @return response
    */
     public function postUpdatePost($id,PostUpdaterequest $request,PostInterface $postRepo)
     {
        $data = $request->inputs();
        $post = $postRepo->postUpdatePost($id,$data);
        return redirect()->back()->with('error','Success');
     }
}