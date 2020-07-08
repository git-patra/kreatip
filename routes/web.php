<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//* List
Route::get('/', 'indexController@index');
Route::get('/materi', 'materi\indexController@index');
Route::get('/tips', 'tips\indexController@index');
Route::get('/info', 'info\indexController@index');
Route::get('/me', 'me\indexController@index');
Route::get('/terms', 'me\indexController@terms');
Route::get('/privacy', 'me\indexController@privacy');
Route::post('/me', 'me\indexController@sendMail');

//* Search
Route::get('/search', 'search\indexController@index');

//* Detail
Route::get('materi/{subcategory}', 'materi\indexController@course');
Route::get('materi/{course}/{title}', 'materi\indexController@article');

Route::get('tips/{title}', 'tips\indexController@article');

Route::get('info/{category}', 'info\indexController@category');
Route::get('info/{category}/{title}', 'info\indexController@article');

//* APi
Route::domain('api.localhost')->group(function () {
    Route::get('api_g9gxv/materi/artikel', 'materi\apiController@blogs');
    Route::get('api_g9gxv/materi/course', 'materi\apiController@course');
    Route::get('api_g9gxv/materi/artikel/{keyword}', 'materi\apiController@search');

    Route::get('api_g9gxv/tips/artikel', 'tips\apiController@blogs');
    Route::get('api_g9gxv/tips/artikel/{keyword}', 'tips\apiController@search');

    Route::get('api_g9gxv/info/artikel', 'info\apiController@blogs');
    Route::get('api_g9gxv/info/artikel/{keyword}', 'info\apiController@search');
    Route::get('api_g9gxv/info/category', 'info\apiController@categories');
    Route::get('api_g9gxv/info/subcategory', 'info\apiController@subcategories');
    Route::get('api_g9gxv/info/pelajar', 'info\apiController@pelajars');
    Route::get('api_g9gxv/info/continent', 'info\apiController@continents');
    Route::get('api_g9gxv/info/country', 'info\apiController@countries');
    Route::get('api_g9gxv/info/course', 'info\apiController@courses');
});

//* Auth 
// Auth::routes();
// Authentication Routes...
Route::get('/di8qb_login', 'Auth\LoginController@showLoginForm');
Route::post('/di8qb_login', 'Auth\LoginController@login');
Route::post('/di8qb_logout', 'Auth\LoginController@logout');

// Registration Routes...
// Route::get('/mnkmd_register', 'Auth\RegisterController@showRegistrationForm');
// Route::post('/mnkmd_register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
// Route::post('password/reset', 'Auth\PasswordController@reset');


//* Dashboard
Route::get('/dashboard', 'dashboard\indexController@index')->middleware('dashboard');
// Materi
Route::get('dash/materi/category/{id}', 'dashboard\materi\categoryController@edit')->middleware('dashboard');
Route::get('dash/materi/category', 'dashboard\materi\categoryController@index')->middleware('dashboard');
Route::resource('dash/materi/category', 'dashboard\materi\categoryController')->middleware('dashboard');

Route::get('dash/materi/subcategory/{id}', 'dashboard\materi\subcategoryController@edit')->middleware('dashboard');
Route::get('dash/materi/subcategory', 'dashboard\materi\subcategoryController@index')->middleware('dashboard');
Route::resource('dash/materi/subcategory', 'dashboard\materi\subcategoryController')->middleware('dashboard');

Route::get('dash/materi/course/{id}', 'dashboard\materi\courseController@edit')->middleware('dashboard');
Route::get('dash/materi/course', 'dashboard\materi\courseController@index')->middleware('dashboard');
Route::resource('dash/materi/course', 'dashboard\materi\courseController')->middleware('dashboard');

Route::get('dash/materi/article', 'dashboard\materi\articleController@index')->middleware('dashboard');
Route::get('dash/materi/article/add', 'dashboard\materi\articleController@create')->middleware('dashboard');
Route::get('dash/materi/article/{id}', 'dashboard\materi\articleController@edit')->middleware('dashboard');
Route::post('dash/materi/article/upimage', 'dashboard\materi\articleController@upimage')->name('upload.upload')->middleware('dashboard');
Route::resource('dash/materi/article', 'dashboard\materi\articleController')->middleware('dashboard');
// Tips
Route::get('dash/tips/category/{id}', 'dashboard\tips\categoryController@edit')->middleware('dashboard');
Route::get('dash/tips/category', 'dashboard\tips\categoryController@index')->middleware('dashboard');
Route::resource('dash/tips/category', 'dashboard\tips\categoryController')->middleware('dashboard');

Route::get('dash/tips/article', 'dashboard\tips\articleController@index')->middleware('dashboard');
Route::get('dash/tips/article/add', 'dashboard\tips\articleController@create')->middleware('dashboard');
Route::get('dash/tips/article/{id}', 'dashboard\tips\articleController@edit')->middleware('dashboard');
Route::resource('dash/tips/article', 'dashboard\tips\articleController')->middleware('dashboard');
// Info
Route::get('dash/info/category/{id}', 'dashboard\info\categoryController@edit')->middleware('dashboard');
Route::get('dash/info/category', 'dashboard\info\categoryController@index')->middleware('dashboard');
Route::resource('dash/info/category', 'dashboard\info\categoryController')->middleware('dashboard');

Route::get('dash/info/subcategory/{id}', 'dashboard\info\subcategoryController@edit')->middleware('dashboard');
Route::get('dash/info/subcategory', 'dashboard\info\subcategoryController@index')->middleware('dashboard');
Route::resource('dash/info/subcategory', 'dashboard\info\subcategoryController')->middleware('dashboard');

Route::get('dash/info/lain/pelajar/{id}', 'dashboard\info\pelajarController@edit')->middleware('dashboard');
Route::get('dash/info/lain/pelajar', 'dashboard\info\pelajarController@index')->middleware('dashboard');
Route::resource('dash/info/lain/pelajar', 'dashboard\info\pelajarController')->middleware('dashboard');

Route::get('dash/info/lain/continent/{id}', 'dashboard\info\continentController@edit')->middleware('dashboard');
Route::get('dash/info/lain/continent', 'dashboard\info\continentController@index')->middleware('dashboard');
Route::resource('dash/info/lain/continent', 'dashboard\info\continentController')->middleware('dashboard');

Route::get('dash/info/lain/country/{id}', 'dashboard\info\countryController@edit')->middleware('dashboard');
Route::get('dash/info/lain/country', 'dashboard\info\countryController@index')->middleware('dashboard');
Route::resource('dash/info/lain/country', 'dashboard\info\countryController')->middleware('dashboard');

Route::get('dash/info/lain/course/{id}', 'dashboard\info\courseController@edit')->middleware('dashboard');
Route::get('dash/info/lain/course', 'dashboard\info\courseController@index')->middleware('dashboard');
Route::resource('dash/info/lain/course', 'dashboard\info\courseController')->middleware('dashboard');

Route::get('dash/info/article', 'dashboard\info\articleController@index')->middleware('dashboard');
Route::get('dash/info/article/add', 'dashboard\info\articleController@create')->middleware('dashboard');
Route::get('dash/info/article/{id}', 'dashboard\info\articleController@edit')->middleware('dashboard');
Route::resource('dash/info/article', 'dashboard\info\articleController')->middleware('dashboard');
// Profile
Route::resource('/dash/auth/profile', 'dashboard\profileController')->middleware('dashboard');
Route::resource('/dash/auth/changepass', 'dashboard\changepassController')->middleware('dashboard');
