<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text','from_id','to_id'
    ];    

    public function fromUsers()
    {
       return $this->belongsTo('App\User','from_id','id')->orderBy('created_at');
    }
}