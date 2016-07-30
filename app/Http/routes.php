<?php

Route::get('/', 'SPAController@index');

/**
 * RESTful APIs
**/

Route::group(array('prefix' => 'api/'), function() {
    Route::get('auth/me', 'AuthenticationController@me');
    Route::post('auth/login', 'AuthenticationController@authenticate');
    Route::get('auth/validate_token', 'AuthenticationController@validateToken');

    Route::resource('category', 'CategoryController', ['only' => ['index', 'show']]);
    /*
    Route::get('category/subcategories/{slug_of_parent?}', array(
        'uses'  => 'CategoryController@subcategories'
    ));
    */
    Route::get('category/{slug}/breadcrumb', ['uses' => 'CategoryController@breadcrumb']);

    Route::resource('topic', 'TopicController', array('only' => ['index', 'store']));
});
