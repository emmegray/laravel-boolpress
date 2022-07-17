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
    Route::get('/{slug}', 'PageController@getPost');
    Route::get('/category/{category}', 'PageController@getPostByCategory');
    Route::get('/tag/{tag}', 'PageController@getPostByTag');
    Route::get('/category/{category}/tag/{tag}', 'PageController@getPostsByCatTag');
});
