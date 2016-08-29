<?php namespace App\Contracts;

interface ImageInterface
{
	/**
	* create new image 
	*
	* @param array $data
    * @return response 
	*/
	public function postCreateImage($data);

	/**
	* get all images
	*
	*
	*/
	public function getAllImages();
}