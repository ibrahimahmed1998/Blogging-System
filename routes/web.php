<?php
use App\Http\Controllers\AUTH_USERS\Add_user;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () { return view('home'); });
Route::get('/signup', function () {  return view('signup'); });
Route::get('/admin', function () {  return view('dashboard'); });
Route::get('/visitor', function () { return view('visitor'); });
Route::post('/add_user', [Add_user::class, 'add_user']);
