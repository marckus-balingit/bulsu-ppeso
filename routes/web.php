<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// COLLEGES
Route::resource('/college', 'CollegeController')->except('show');

Route::view('/users', 'admin.users.index');
Route::view('/students', 'admin.students.index');
// Route::view('/college', 'admin.college.index');
// Route::resource('/user',)
