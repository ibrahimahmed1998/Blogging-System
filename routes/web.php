<?php

use App\Http\Controllers\AUTH_USERS\Add_user;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/s', function ()
{
    return view('signup');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('dashboard');
});

Route::get('/1', function () {
    return view('test');
});


// Route::post('/add_user', function () {
//     return view('welcome');
// });
//[UserController::class, 'show']
//Route::post('/add_user', Add_user::class.'@add_user');
Route::post('/add_user', [Add_user::class, 'add_user']);

