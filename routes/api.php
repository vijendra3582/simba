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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/security-questions', ['uses' => 'Api\CommonController@getSecurityQuestions', 'as' => 'get.security.question']);
Route::post('user/register', ['uses' => 'Api\UserController@register', 'as' => 'user.register']);
Route::post('user/login', ['uses' => 'Api\UserController@login', 'as' => 'user.login']);
// Route::post('user/register', function(){
//     echo "hhhhhhhhhhh";die;
// });
