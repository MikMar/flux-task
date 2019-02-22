<?php

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

Route::get('/', 'IndexController@courses');
Route::get('/course/{id}', 'IndexController@course');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/courses', 'HomeController@courses');
Route::get('/home/add-course', 'HomeController@addCourse');
Route::get('/home/edit-course/{id}', 'HomeController@editCourse');
Route::post('/home/delete-course/{id}', 'HomeController@deleteCourse');
Route::post('/home/save-course', 'HomeController@saveCourse');
