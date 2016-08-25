<?php

Route::get('/', 'SPAController@index');

/**
 * RESTful APIs
**/

Route::post('auth/google', function() {
    Log::info("code:". Request::input('code'));
});

Route::group(array('prefix' => 'api/', 'middleware' => 'cors'), function() {
    Route::post('auth/me', 'AuthenticationController@me'); // get authenticated user
    Route::post('auth/login', 'AuthenticationController@login');
    Route::post('auth/register', 'AuthenticationController@register');
    Route::get('auth/header', 'AuthenticationController@header');
    Route::get('auth/validate_token', 'AuthenticationController@validateToken');

    Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
    Route::get('category/{slug}/breadcrumb', ['uses' => 'CategoryController@breadcrumb']);

    Route::resource('topic', 'TopicController', ['only' => ['index', 'show', 'store']]);
    Route::get('topic/paginate/{category_id}/{page_current}/{page_capacity}', 'TopicController@paginate');

/*
    Route::resource('avatar', 'AvatarController', ['only' => ['show', 'store']]);
    Route::get('avatar/{id}/image', ['uses' => 'AvatarController@image']);

    Route::get('identifier', 'IdentifierController@index');
    Route::get('test', function() {
        return Request::header();
    });
*/
    Route::put('user/avatar', 'UserController@updateAvatar');
});

Route::get('/wetest', function() {
    return 'Why!';
});
