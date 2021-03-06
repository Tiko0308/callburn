<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersCreaterequest;
use App\Http\Requests\PostsCreaterequest;
use App\Contracts\PostInterface;
use Validator;
use Auth;

class PostController extends Controller
{


	 /**
     * Adding new post
     * Post /user/dashboard
     * @param Request $request
     * @param PostInterface $postRepo
     * @return response
     */
    public function postAddPost(Request $request,PostInterface $postRepo)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'post'=>'string',
            'user_id'=>'integer'
        ]);
        if($validator->fails()){
            $errorMessage="Something went wrong";
            $result=[
                'error'=>[
                    'code'=>422,
                    'text'=>$errorMessage,
                ],
            ];
            return response()->json($result);
        };
        $data['user_id'] = Auth::user()->id;
        $post= $postRepo->getCreatePost($data);
    }

     /**
     * Deleting  post by admin
     * Post /admin/dashboard
     * @param Request $request
     * @param PostInterface $postRepo
     * @return response
     */
     public function postDeletePost(Request $request,PostInterface $postRepo)
     {
     	$id = $request ->get('id');
     	$result=$postRepo->postDeletePost($id);
     }
     
     
   
}

