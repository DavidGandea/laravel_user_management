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

Auth::routes();

/* Route::get('/', function () {
    return view('pages.index');
});
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/utilizators', 'UtilizatorsController@index')->middleware('is_admin')->name('admin');
Route::get('/', 'UtilizatorsController@index1');
Route::resource('utilizators', 'UtilizatorsController');