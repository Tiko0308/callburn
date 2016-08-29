<?php namespace App\Service;
	
use App\Contracts\ImageInterface;
use App\Image;


class ImageService implements Imageinterface
{

	/**
     * Create a new instance of PostService.
     *
     * @return void
     */
	function __construct()
	{
		$this->image = new Image();
	}
     
    /**
	* create new image 
	*
	* @param array $data
    * @return response 
	*/
	public function postCreateImage($data)
	{
		$image = $this->image->create($data);
		return $image;
	}

	/**
	* get all images 
	*
	* 
    * @return response 
	*/
	public function getAllImages()
	{
		$image = $this->image;
		$image = $image->with('fromUser')->get();
		 return $image;
	}
}