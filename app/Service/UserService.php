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

	public function getCreateUser($data)
	{
		$user = $this->user->create($data);
		return $user;
	}
	public function getAllUsers()
	{
		$user = $this->user->where('role','!=','admin')->get();
		 return $user;
	}
}