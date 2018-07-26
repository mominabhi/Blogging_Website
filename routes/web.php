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


//Route::get('/home',function (){
//    return view('home');
//});
Schema::defaultStringLength(191);
Route::get('/','welcomeController@loadHome');
Route::get('/category_post/{id}','welcomeController@category_post_show');
Route::get('/post_detail/{id}','welcomeController@post_detail');
Route::get('/popular_post','welcomeController@popular_post');
Route::post('/comment_info','welcomeController@comment_info');
Route::get('/portfolio','welcomeController@portfolio');
Route::get('/contact','welcomeController@contact');

Route::get('/login','superAdminController@admin_login');
Route::put('/login_master','superAdminController@admin_master');
Route::get('/master','superAdminController@loadMaster');
Route::get('/logout','superAdminController@admin_logout');

Route::get('/add_category','superAdminController@add_Category');
Route::post('/check_category','superAdminController@check_cetegory');
Route::get('/manage_category','superAdminController@manage_category');

Route::get('/publish_category/{id}','superAdminController@publish_category');
Route::get('/delete_category/{id}','superAdminController@delete_category');
Route::get('/edit_category/{id}','superAdminController@edit_category');
Route::post('/update_category','superAdminController@update_category');

Route::get('/add_blog','superAdminController@add_blog');
Route::post('/check_blog','superAdminController@check_blog');
Route::get('/manage_blog','superAdminController@manage_blog');

Route::get('/publish_blog/{id}','superAdminController@publish_blog');
Route::get('/delete_blog/{id}','superAdminController@delete_blog');
Route::get('/edit_blog/{id}','superAdminController@edit_blog');
Route::post('/update_blog','superAdminController@update_blog');