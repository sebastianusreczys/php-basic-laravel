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
Route::get('/auth/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::get('/auth', 'App\Http\Controllers\LoginController@authenticate')->name('auth');
Route::post('/auth/login', 'App\Http\Controllers\LoginController@authenticate');
Route::get('/auth/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');
Route::patch('/admin/member/{user}', 'App\Http\Controllers\AdminController@update');
Route::delete('/admin/member/{user}', 'App\Http\Controllers\AdminController@delete');
Route::post('/admin/create', 'App\Http\Controllers\AdminController@store');
Route::get('/admin/create', 'App\Http\Controllers\AdminController@create');
Route::get('/admin/members', 'App\Http\Controllers\MemberController@index');
Route::get('/admin/members/{user}/edit', 'App\Http\Controllers\AdminController@edit');

// route member
Route::get('/member/{user}/edit', 'App\Http\Controllers\MemberController@edit')->name('member-edit');
Route::patch('/member/{user}', 'App\Http\Controllers\MemberController@update');
Route::get('/member/pendaftaran', 'App\Http\Controllers\MemberController@create');
Route::get('/member/profil', 'App\Http\Controllers\MemberController@detail')->name('profil');
Route::post('/member/pendaftaran', 'App\Http\Controllers\MemberController@store');
Route::delete('/member/{user}', 'App\Http\Controllers\MemberController@destroy');


// member list json
Route::get('/member/listjson/', 'App\Http\Controllers\MemberController@listJson');
