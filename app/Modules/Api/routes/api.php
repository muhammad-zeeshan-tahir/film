<?php




Route::group(['module' => 'Api', 'middleware' => ['web']], function () {
    Route::group(['prefix' => 'films'], function () {
        Route::get('/', 'FilmController@index');
    });
});
