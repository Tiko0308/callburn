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

	public function getFromUserMessages($id)
	{
		$messages = $this->message->where('from_id',$id)->with('toUsers')->get();
		return $messages;
	}

	public function getToUserMessages($id)
	{
		$messages = $this->message->where('to_id',$id)->with('fromUsers')->get();
		return $messages;
	}
}