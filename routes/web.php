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
    Route::get('api/materi/artikel', 'materi\apiController@blogs');
    Route::get('api/materi/artikel/{keyword}', 'materi\apiController@search');
    // Route::get('api/materi/course', 'materi\apiController@courses');
    // Route::get('api/materi/subcategory', 'materi\apiController@subcategories');
    // Route::get('api/materi/category', 'materi\apiController@categories');

    Route::get('api/tips/artikel', 'tips\apiController@blogs');
    // Route::get('api/tips/category', 'tips\apiController@categories');

    Route::get('api/info/artikel', 'info\apiController@blogs');
    // Route::get('api/info/category', 'info\apiController@categories');
    // Route::get('api/info/subcategory', 'info\apiController@subcategories');
    // Route::get('api/info/continent', 'info\apiController@continents');
    Route::get('api/info/country', 'info\apiController@countries');
    // Route::get('api/info/pelajar', 'info\apiController@pelajars');
    Route::get('api/info/course', 'info\apiController@courses');
});
