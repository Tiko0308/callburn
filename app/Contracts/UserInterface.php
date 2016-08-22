<?php namespace App\Contracts;

interface UserInterface
{	
	/**
	 * create new user 
	 *
	 * @param array $data
	 * @return user 
	 */ 
	public function getCreateUser($data);

	/**
	*
	*
	*@return users
	*/
	public function getAllUsers();

	/**
	*Delete some users
	*
	*@param integer $id
	*@return users
	*/
	public function postDeleteUsers($id);
}