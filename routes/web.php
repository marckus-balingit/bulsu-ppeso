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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// COLLEGES
Route::resource('/college', 'CollegeController')->except('show');
Route::get('/college/{id}','CollegeController@show')->name('college.show');
Route::post('/college/import','CollegeImportController@store')->name('college.import');
// COURSES
Route::resource('/course', 'CourseController')->except('show');
// USERS
Route::resource('/users', 'UserController')->except('show');
// STUDENTS
Route::resource('/students', 'StudentController')->except('show');

// Route::view('/users', 'admin.users.index');
// Route::view('/students', 'admin.students.index');
Route::resource('/study','SpecializationController')->except('show');
// Route::resource('/user',)
