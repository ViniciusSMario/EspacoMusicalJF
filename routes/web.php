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

Route::get('/','WelcomeController@index');

Auth::routes();
Route::get('/register')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/courses', 'HomeController@courses')->name('courses');
Route::get('/admin/teachers', 'HomeController@teachers')->name('teachers');


Route::prefix('/admin/courses')->group(function(){
    Route::get('/', 'CoursesController@index');
    Route::post('/', 'CoursesController@store');
    Route::get('/edit/{id}', 'CoursesController@edit');
    Route::post('update/{id}', 'CoursesController@update');
    Route::get('delete/{id}', 'CoursesController@destroy');
});

Route::prefix('/admin/school')->group(function(){
    Route::get('/', 'SchoolController@index');
    Route::post('/', 'SchoolController@store');
    Route::get('/edit/{id}', 'SchoolController@edit');
    Route::post('update/{id}', 'SchoolController@update');
    Route::get('delete/{id}', 'SchoolController@destroy');
});

Route::prefix('/admin/teachers')->group(function(){
    Route::get('/', 'TeacherController@index');
    Route::post('/', 'TeacherController@store');
    Route::get('/edit/{id}', 'TeacherController@edit');
    Route::post('update/{id}', 'TeacherController@update');
    Route::get('delete/{id}', 'TeacherController@destroy');
    Route::post('/courses', 'TeacherController@relationship');
    Route::get('courses/delete/{id}', 'TeacherController@deleteRelationship');

});


    