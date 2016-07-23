<?php

Route::get('/', 'SPAController@index');

/**
 * RESTful APIs
**/

Route::group(array('prefix' => 'api/'), function() {
    Route::post('auth/login', 'AuthenticationController@authenticate');

    Route::resource('category', 'CategoryController', ['only' => 'index']);
    Route::resource('topic', 'TopicController', ['only' => 'index', 'store']);
});
