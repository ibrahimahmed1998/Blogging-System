<?php
/********************************************************/

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AUTH_USERS\Add_user;
use App\Http\Controllers\AUTH_USERS\Change_pass;
use App\Http\Controllers\AUTH_USERS\Login;
use App\Http\Controllers\AUTH_USERS\Reset_pass;
use App\Http\Controllers\AUTH_USERS\Deep_search;
use App\Http\Controllers\AUTH_USERS\Update_user; // test
use App\Http\Controllers\AUTH_USERS\AuthController;
use App\Http\Controllers\AUTH_USERS\Del_user;
/********************************************************/
//use App\Http\Middleware\type_s;
//use App\Http\Middleware\type_adv;
//use App\Http\Middleware\type_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request)
{
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'],function ($router)
 {
    Route::post('add_user', Add_user::class . '@add_user');
    Route::post('login', Login::class . '@login');
    Route::post('change_pass', Change_pass::class . '@change_pass');
    Route::post('sendresetpasswordemail',Reset_pass::class . '@sendresetpasswordemail');
    Route::post('reset_pass',Reset_pass::class.'@resetpassword');
    Route::post('logout', AuthController::class . '@logout');
    Route::post('refresh', AuthController::class . '@refresh');
    Route::post('me', AuthController::class . '@me');
    Route::post('deep_search',Deep_search::class.'@deep_search');
    Route::post('article',ArticleController::class.'@control');
    Route::get('list',ArticleController::class.'@list');

 });

Route::group(['middleware' => type_admin::class, 'prefix' => '98'],function ($router)
 {
         Route::post('update_user', Update_user::class . '@update_user');
         Route::post('del_user', Del_user::class . '@del_user');
  });

