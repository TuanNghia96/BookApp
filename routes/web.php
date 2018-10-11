<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Response;

Route::get('get','myController@getCookie');

Route::get('home','MyController@getView')->name('home');

Route::get('show/{id}',['as'=>'show','uses'=>'MyController@getShow']);

Route::get('test',function(){
	return view('test');
});


//Comment
Route::get('post',function(){
	return view('post');
})->name('getPost');

Route::post('posted',[	'as'=>'post',
						'uses'=>'myController@postComment'
					]);

//Search
Route::get('Search',[	'as'=>'getSearch',
						'uses'=>'myController@getSearch'
					]);
Route::post('Searched',[	'as'=>'postSearch',
						'uses'=>'myController@postSearch'
					]);

//Client


Route::post('addPhone',['as'=>'adPhone','uses'=>'MyController@postPhone']);
Route::get('rmBillD/{id}',['as'=>'rmBillD','uses'=>'MyController@deleteBillDetail']);

//Bill
Route::get('Bill',['as'=>'getBill','uses'=>'myController@getBill']);
Route::post('Bill',['as'=>'postBill','uses'=>'myController@postBill']);


