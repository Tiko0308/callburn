<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersCreaterequest;
use App\Http\Requests\ImageRequest;
use App\Contracts\UserInterface;
use App\Contracts\PostInterface;
use App\Contracts\MessageInterface;
use App\Contracts\ImageInterface;
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

     /**
     * Get  all friends
     * GEt /user/friends
     * @param UserInterface $userRepo
     * @param integer $id
     * @return response
     */
     public function getFriends($id,UserInterface $userRepo) 
     {
        $friend = $userRepo->getFriends($id);
        $data = [
         'allFriends' => $friend
        ];
        return view('all-friends',$data);
     }

      /**
     * Get  one friends
     * Get /user/one-friend
     * @param UserInterface $userRepo
     * @param integer $id
     * @return response
     */
     public function getOneFriend($id,UserInterface $userRepo) 
     {
        $friend = $userRepo->getOneFriend($id);
        $data = [
            'User' => $friend
        ];
        return view('one-friend',$data);
    }

    /**
     * Post  Upload image
     * 
     * @param ImageRequest $request
     * @param UserInterface $userRepo
     * @return response
     */
    public function postUploadImage(ImageRequest $request,UserInterface $userRepo)
    {
        $logoFile = $request->file('image')->getClientOriginalExtension();
        $name = str_random(12);
        $path = public_path() . '/Uploads';
        $result = $request->file('image')->move($path, $name.'.'.$logoFile);
        $data = [
           'images' => $name.'.'.$logoFile,
        ];
        $result = $userRepo->postUpdateUser(Auth::user()->id,$data);
        return redirect()->back(); 
    }

    /**
     * Get  Messages 
     * 
     * @param integer $id
     * @param MessageInterface $messageRepo
     * @return messages
     */
    public function getChat($id,MessageInterface $messageRepo)
    {
        $fromMessages = $messageRepo->getFromUserMessages(Auth::user()->id,$id);
        $data = [
            'data' => $fromMessages,
            'id' => $id,
        ];
        return view('chat',$data);
    }

    /**
    * Get User upload images
    *
    *
    *
    * @return return response
    */
    public function getImages(ImageInterface $imageRepo)
    {
        $images = $imageRepo->getAllImages();
        $data = [
            'images' => $images
        ];
        return view('images',$data);
    }
}
