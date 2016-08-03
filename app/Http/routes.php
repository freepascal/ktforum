<?php

Route::get('/', 'SPAController@index');

/**
 * RESTful APIs
**/

Route::post('auth/google', function() {
    Log::info("code:". Request::input('code'));
});

Route::group(array('prefix' => 'api/', 'middleware' => 'cors'), function() {
    Route::get('auth/me', 'AuthenticationController@me');
    Route::post('auth/login', 'AuthenticationController@login');
    Route::post('auth/register', 'AuthenticationController@register');
    Route::get('auth/us', 'AuthenticationController@getAuthenticatedUser');
    Route::get('auth/header', 'AuthenticationController@header');

    Route::get('auth/validate_token', 'AuthenticationController@validateToken');

    Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
    Route::get('category/{slug}/breadcrumb', ['uses' => 'CategoryController@breadcrumb']);

    Route::resource('topic', 'TopicController', ['only' => ['index', 'show', 'store']]);

    Route::get('identifier', 'IdentifierController@index');
    Route::get('test', function() {
        return Request::header();
    });
    
});
