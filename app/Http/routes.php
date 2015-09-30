<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['as' => 'chat', 'uses' => 'ChatController@index']);
});

Route::group(['namespace' => 'Api', 'prefix' => 'api'], function () {

    Route::group(['prefix' => 'chat'], function () {
        Route::post('send', ['as' => 'api.chat.send', 'uses' => 'ChatController@send']);
        Route::get('get', ['as' => 'api.chat.get', 'uses' => 'ChatController@get']);
    });

});

Route::get('test', function(){
    $newMessage = \App\Models\Message::create([
        'content' => 'foobar'
    ]);

    Event::fire(new App\Events\MessageCreated($newMessage));
});

