<?php namespace App\Contracts;

interface UserInterface
{	
	public function getCreateUser($data);
	public function getAllUsers();
}