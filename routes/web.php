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

Route::get('/', 'PagesController@index');

Route::get('/dashboard', 'PagesController@dashboard');

Route::get('/bookCategory', 'BooksController@category');


Route::resource('posts','PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/search','PagesController@search');

Route::resource('bookgenre','genreCont');

Route::get('/{id}', 'genreCont@show');

Route::resource('review','reviewCont');

<<<<<<< HEAD
Route::resource('rating','ratingCont');
=======
Route::resource('rating','ratingCont');
>>>>>>> 1f3c64d0ac2e232b4115927edbbf83c719963404
