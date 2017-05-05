<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// 認證路由...
Route::auth();
Route::get('/home', function () {
    return view('home');
});

Route::get('/'                   , ['as' => 'home.index' , 'uses' => 'HomeController@index']);
Route::get('posts'               , ['as' => 'posts.index', 'uses' => 'PostsController@index']);
Route::get('posts/{pid}'          , ['as' => 'posts.show' , 'uses' => 'PostsController@show']);
Route::post('posts/{pid}/comments', ['as' => 'posts.comments.store' , 'uses' => 'CommentsController@store']);
Route::delete('posts/{pid}/comments/{cid}', ['as' => 'posts.comments.destroy','uses' => 'CommentsController@destroy']);

// 後台
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'AdminDashboardController@index']);

    Route::get('posts'          , ['as' => 'admin.posts.index' , 'uses' => 'AdminPostsController@index']);
    Route::get('posts/create'   , ['as' => 'admin.posts.create', 'uses' => 'AdminPostsController@create']);
    Route::post('posts'         , ['as' => 'admin.posts.store' , 'uses' => 'AdminPostsController@store']);
    Route::get('posts/{id}/edit', ['as' => 'admin.posts.edit'  , 'uses' => 'AdminPostsController@edit']);
    Route::patch('posts/{id}'   , ['as' => 'admin.posts.update', 'uses' => 'AdminPostsController@update']);
    Route::delete('posts/{id}'  , ['as' => 'admin.posts.destroy','uses' => 'AdminPostsController@destroy']);

});

