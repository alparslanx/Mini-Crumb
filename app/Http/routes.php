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

Route::get('/', array(
    'as'   =>  'home',
    'uses'  =>  'HomeController@index'
));

Route::any('/register', array(
    'as'   =>  'register',
    'uses'  =>  'UserController@register'
));

Route::any('/login', array(
    'as'   =>  'login',
    'uses'  =>  'UserController@login'
));

Route::group(['prefix' => 'user'], function()
{

    Route::get('/{username}', [
        'as' => 'user_show',
        'uses' => 'UserController@show'
    ]);

});

Route::group(['prefix' => 'admin'], function()
{

    Route::get('/index', [
        'as' => 'admin_home',
        'uses' => 'AdminController@index'
    ]);

});
