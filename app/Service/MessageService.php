<?php namespace App\Service;
	
use App\Contracts\MessageInterface;
use App\Message;

class MessageService implements MessageInterface
{

	/**
     * Create a new instance of PostService.
     *
     * @return void
     */
	function __construct()
	{
		$this->message = new Message();
	}

	/**
	 * create new message 
	 *
	 * @param array $data
	 * @return response 
	 */ 
	public function getCreateMessage($data)
	{
	    $message = $this->message->create($data);
		return $message;
	}

	public function getFromUserMessages($id,$userId)
	{
		$messages = $this->message->where('from_id',$id)->where('to_id',$userId);
		
		$messages = $messages->orwhere(function($query) use ($userId,$id) {
            $query->where('to_id',$id)->where('from_id',$userId);
        });
        
        $messages = $messages->with('toUsers')->get();
		return $messages;
	}

	public function getToUserMessages($id,$userId)
	{
		$messages = $this->message->where('to_id',$id)->where('from_id',$userId)->with('fromUsers')->get();
		return $messages;
	}
}