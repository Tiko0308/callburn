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

	/**
	 * delete some posts 
	 *
	 * @param integer $id
	 * @return post 
	 */ 
	public function postDeletePost($id);

	/**
	 * get one post 
	 *
	 * @param inteeger $id
	 * @return post 
	 */ 
	public function getOnePost($id);

	/**
	*update post
	*
	*@param integer $id
	*@param array $data
	*@return post
	*/
	public function postUpdatePost($id,$data);

}