<?php


Route::group(['module' => 'FrondEnd', 'middleware' => ['web']], function() {

    Route::group(['prefix'=>'/frontend'],function(){

        Route::get('/film', 'FilmController@index');
        Route::get('/film/create', 'FilmController@create');
        Route::post('/film/save', 'FilmController@store');
        Route::get('/films/{name}', 'FilmController@show');

        Route::get('/film/signup', 'SignupController@signup');
        Route::post('/film/signup/store', 'SignupController@store');

        Route::get('/film/signin', 'SigninController@signin');
        Route::post('/film/signin/attenticate', 'SigninController@attenticate');

        Route::post('/film/comment/store', 'CommentController@store');


    });

});
