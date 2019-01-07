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

// Auth routes
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


// Posts
// We could also use Route::resource('innlegg', 'PostController'), but this gives us finer control:
Route::prefix('innlegg')->group(function () {
    Route::get('/',                 'PostController@index')->name('post.index');
    Route::get('/admin',            'PostController@index_admin')->name('post.index.admin');
    Route::get('ny',                'PostController@create')->name('post.create');
    Route::post('lagre',            'PostController@store')->name('post.store');
    Route::get('{post}',            'PostController@show')->name('post.show');
    Route::get('{post}/rediger',    'PostController@edit')->name('post.edit');
    Route::patch('{post}/oppdater', 'PostController@update')->name('post.update');
    Route::get('{post}/slett',      'PostController@delete')->name('post.delete');
    Route::delete('{post}/slett',   'PostController@destroy')->name('post.destroy');
});
