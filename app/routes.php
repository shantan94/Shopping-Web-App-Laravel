<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('page1',array('uses'=>'page1@get_page1'));

Route::post('page1',array('uses'=>'page1@login'));

Route::get('page2',array('uses'=>'page2@get_page2'));

Route::post('page2',array('uses'=>'page2@get_page2'));

Route::get('page2',array('uses'=>'page2@search'));

Route::get('page3',array('uses'=>'page3@get_page3'));

Route::post('page3',array('uses'=>'page3@get_page3'));

Route::get('page4',array('uses'=>'page4@get_page4'));

Route::post('page4',array('uses'=>'page4@get_register'));
