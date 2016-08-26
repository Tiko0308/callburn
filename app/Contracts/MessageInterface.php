<?php namespace App\Contracts;

interface MessageInterface
{
	/**
	 * create new message 
	 *
	 * @param array $data
	 * @return response 
	 */ 
	public function getCreateMessage($data);

	/**
	 * get  messages
	 *
	 * @param integer $id
	 * @param integer $userId
	 * @return messages 
	 */ 
	public function getFromUserMessages($id,$userId);

}