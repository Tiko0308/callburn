<?php namespace App\Service;
	
use App\Contracts\PostInterface;
use App\Post;

class Postservice implements PostInterface
{
	/**
     * Create a new instance of PostService.
     *
     * @return void
     */
	function __construct()
	{
		$this->post = new Post();
	}
	/**
	 * create new post 
	 *
	 * @param array $data
	 * @return response 
	 */ 
	public function getCreatePost($data)
	{
		$post = $this->post->create($data);
		return $post;
	}
	
	/**
	 * get all posts 
	 *
	 * 
	 * @return post 
	 */ 
	public function getAllPost()
	{
		$post = $this->post->get();
		 return $post;
	}

	/**
	 * delete some posts 
	 *
	 * @param integer $id
	 * @return post 
	 */ 
	public function postDeletePost($id)
	{
		$post = $this->post->where('id','=',$id)->delete();
		return $post;
	}
}