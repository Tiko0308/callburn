<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MessageCreaterequest;
use App\Contracts\MessageInterface;
use Validator;
use Auth;

class MessageController extends Controller
{

	 /**
     * Sending new message
     * Post /user/chat/3
     * @param Request $request
     * @param PostInterface $postRepo
     * @return response
     */
     public function postAddMessage(Request $request,MessageInterface $messageRepo,$id)
     {
     	$data = $request->all();
     	$validator = Validator::make($data,[
            'message'=>'string',
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
        $data['to_id'] = $id;
        $data['from_id'] = Auth::user()->id;
        $data['text'] = $data['message'];
        $result = $messageRepo->getCreateMessage($data);
     }

}