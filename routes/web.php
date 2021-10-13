<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('index');
});

// login route
Route::get('/auth/login', 'App\Http\Controllers\LoginController@index');
Route::post('/auth/login', 'App\Http\Controllers\LoginController@authenticate');
Route::post('/auth/logout', 'App\Http\Controllers\LoginController@authenticate');

Route::get('/admin/view', 'App\Http\Controllers\AdminController@index');
Route::get('/admin/{user}/edit', 'App\Http\Controllers\AdminController@edit');
Route::patch('/admin/{user}', 'App\Http\Controllers\AdminController@update');
Route::delete('/admin/{user}', 'App\Http\Controllers\AdminController@delete');
Route::post('/admin/create', 'App\Http\Controllers\AdminController@store');
Route::get('/admin/create', 'App\Http\Controllers\AdminController@create');

// route member
Route::get('/member/list', 'App\Http\Controllers\MemberController@index')->name('list');
Route::get('/member/{user}/edit', 'App\Http\Controllers\MemberController@edit');
Route::patch('/member/{user}', 'App\Http\Controllers\MemberController@update');
Route::get('/member/pendaftaran', 'App\Http\Controllers\MemberController@create');
Route::post('/member/pendaftaran', 'App\Http\Controllers\MemberController@store');
Route::delete('/member/{user}', 'App\Http\Controllers\MemberController@destroy');


// member list json
Route::get('/member/listjson/', 'App\Http\Controllers\MemberController@listJson');
