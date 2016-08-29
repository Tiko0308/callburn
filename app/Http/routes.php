<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('user','UsersController');
Route::controller('admin','AdminsController');
Route::controller('post','PostController');
Route::controller('message','MessageController');
Route::controller('image','ImagesController');