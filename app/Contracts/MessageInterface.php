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

}