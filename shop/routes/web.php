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

Route::get('/', 'FrontendController@welcom');

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cate_management', 'CategoryController');
Route::resource('/product_management', 'ProductController');


Route::resource('/language_management', 'LanguageController');
Route::resource('/author_management', 'AuthorController');
Route::resource('/pub_management', 'PublisherController');
Route::resource('/prf_management', 'PriceFilterController');
Route::resource('/dis_management', 'DiscountController');
Route::post('subscribe', 'FrontendController@subscribe');




Route::group(['middleware' => 'auth'], function() { //sử dụng để sau khi logout, truy cập lại trang vừa r thì sẽ vào phần login
    Route::resource('/proDetail_management', 'ProductDetailController');
    Route::post('/proDetail_management/change/{id}', 'ProductDetailController@change')->name('proDetail_management.change');

    Route::resource('/news_management', 'NewsController');
    Route::post('/news_management/change/{id}', 'NewsController@change')->name('news_management.change');

    Route::resource('/newscate_management', 'NewsCategoryController');
    Route::resource('/tag_management', 'TagController');

});

Route::group(['middleware'=>'CheckRole'],function (){
    Route::get('/user_management', 'Admin_userController@index')->name('user_management.index');
    Route::get('/user_management/add', 'Admin_userController@add')->name('user_management.add');
    Route::get('/user_management/search?nhap=/{search}', 'Admin_userController@search')->name('user_management.search');
    Route::get('search/{search?}', 'Admin_userController@process')->name('admin_userController.process');
    Route::get('filter_status={status?}', 'Admin_userController@status')->name('user_management.status');
    Route::resource('/user_management', 'Admin_userController');
});



Route::get('/add_cart/{id}', 'OrderController@addCart')->name('add.cart');
Route::put('order/update/{id?}/{qty?}-{dk?}','OrderController@updateCart')->name('order.updateCart');
Route::resource('order', 'OrderController');


Route::get('login/admin', 'Admin_userController@getLogin')->name('login.admin');
Route::post('login/admin', 'Admin_userController@postLogin');
Route::get('message', 'Admin_userController@getLogin')->name('message_for_login');
