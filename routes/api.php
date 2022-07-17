<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
->prefix('posts')
->group(function () {
    Route::get('/', 'PageController@index');
    Route::get('/posts/{slug}', 'PageController@getPost');
    Route::get('/category/{category}/posts', 'PageController@getPostByCategory');
    Route::get('/tag/{tag}/posts', 'PageController@getPostByTag');
    Route::get('/category/{category}/tag/{tag}/posts', 'PageController@getPostsByCatTag');
});
