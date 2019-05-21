<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// middleware('auth:api')->
Route::get('/user', 'UserController@getAllUser')->name('getAllUser');

Route::post('/user', 'UserController@createUser')->name('createUser');

Route::post('/webhooks', function(){
    //echo shell_exec('cd /home && sh /home/scripts/deploy.sh');
    echo shell_exec('sh '.dirname(__DIR__.'..').'deploy.sh'); 
    return response('Deploy success', 200);
})->name('createUser');
