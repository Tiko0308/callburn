<?php namespace App\Service;
	
use App\Contracts\UserInterface;
use App\User;

class UserService implements UserInterface
{
	/**
     * Create a new instance of CategoryService.
     *
     * @return void
     */
	function __construct()
	{
		$this->user = new User();
	}
	/**
	 * create new user 
	 *
	 * @param array $data
	 * @return user 
	 */ 

	public function getCreateUser($data)
	{
		$user = $this->user->create($data);
		return $user;
	}
	/**
	*
	*
	*@return users
	*/
	public function getAllUsers()
	{
		$user = $this->user->where('role','!=','admin')->get();
		 return $user;
	}

	/**
	*Delete some users
	*
	*@param integer $id
	*@return users
	*/
	public function postDeleteUsers($id)
	{
		$user = $this->user->where('id','=',$id)->delete();
		return $user;

	}

	/**
	*Get one user
	*
	*@param integer $id
	*@return user
	*/
	public function getOneUser($id)
	{
		$user = $this->user->find($id);
		return $user;
	}

	/**
	*Update user
	*
	*@param integer $id
	*@param array $data
	*@return user
	*/
	public function postUpdateUser($id,$data)
	{
		$user = $this->getOneUser($id)->update($data);
		return $user;
	}
}