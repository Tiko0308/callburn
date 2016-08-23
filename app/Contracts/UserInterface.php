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
	*Get all users
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

	/**
	*Get one user
	*
	*@param integer $id
	*@return user
	*/
	public function getOneUser($id);

	/**
	*Update user
	*
	*@param integer $id
	*@param array $data
	*@return user
	*/
	public function postUpdateUser($id,$data);
}