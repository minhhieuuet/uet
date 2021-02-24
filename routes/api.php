<?php
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::group([
        'middleware' => ['auth:api'],
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::group(['middleware' => 'auth:api', 'prefix' => '/'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@getUsers');
    });
    Route::group(['prefix' => 'files'], function () {
        Route::get('/', 'FileController@getFiles');
        Route::post('/', 'FileController@createFile');
        Route::get('/histories/{file}', 'FileController@getHistories');
    });
});

Route::group(['middleware' => ['auth:api', 'isAdmin'], 'prefix' => 'admin'], function () {

});

Route::group(['middleware' => ['auth:api', 'isAdminOrSelf'], 'prefix' => 'user'], function () {
    // Route::post('/category/remove-from-store/{category}', function () {
    //     return "hihi";
    // });
});
