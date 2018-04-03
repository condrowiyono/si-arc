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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () { return view('welcome'); });
    Route::get('/home', function () { return view('welcome'); });
    
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');  
    //Kelompok item
    Route::prefix('items')->group(function () {
	    Route::resource('locations','LocationController');
	    Route::resource('brands','BrandController');
	    Route::resource('sources','SourceController');   
	});
	Route::resource('items','ItemController');


    Route::get('/p/{username}', 'ProfileController@show')->name('profile.show');
    Route::get('/p/{username}/contact', 'ProfileController@showContact')->name('profile.showContact');
    Route::get('/p/{username}/division', 'ProfileController@showDivision')->name('profile.showDivision');
    Route::get('/p/{username}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::match(['put', 'patch'],'/p/{username}/update', 'ProfileController@updateProfile')->name('profile.update');
});