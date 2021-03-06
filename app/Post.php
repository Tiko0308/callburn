<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post','user_id'
    ];

    public function fromUser()
    {
         return $this->belongsTo('App\User','user_id');
    }
}
