<?php namespace App\Contracts;

interface PostInterface
{	
	/**
	 * create new post 
	 *
	 * @param array $data
	 * @return response 
	 */ 
	public function getCreatePost($data);

	/**
	 * get all posts 
	 *
	 * 
	 * @return post 
	 */ 
	public function getAllPost();

}