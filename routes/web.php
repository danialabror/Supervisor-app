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

Route::prefix('home')->group(function () {
    Route::get('/{id}', 'HomeController@indexTeacher');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/sched', 'SchController@index');
});


//Teacher
Route::post('/material', 'MaterialController@post');

//SUPERVISOR
Route::get('{name}/file/{file}', 'MaterialController@download');
Route::patch('approving/{id}', 'MaterialController@approve');

//CURRICULUM
Route::post('/schedule', 'SchController@create');
