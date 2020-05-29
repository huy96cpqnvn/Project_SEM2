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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cate_management', 'CategoryController');
Route::resource('/product_management', 'ProductController');

Route::resource('/language_management', 'LanguageController');
Route::resource('/author_management', 'AuthorController');
Route::resource('/pub_management', 'PublisherController');
Route::resource('/prf_management', 'PriceFilterController');
