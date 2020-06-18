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

Route::get('/', 'FrontendController@welcom')->name('welcom');
Route::get('/category.html/{id?}/{product_id?}', 'FrontendController@category');
Route::get('/filter_price}', 'FrontendController@filterPriceCate')->name('filter.price');


Route::get('/single.html/{id}', 'FrontendController@single');
// Route::resource('/cart', 'OrderDetailController');
Route::get('/about', 'FrontendController@about');

Route::get('frontendsearch/{search?}','FrontendController@search')->name('frontend.search');
Route::get('/contact', 'FrontendController@contact');
Route::post('post_message','FrontendController@post_message');




/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();
Route::post('subscribe', 'FrontendController@subscribe');
Route::group(['middleware' => 'auth'], function() { //sử dụng để sau khi logout, truy cập lại trang vừa r thì sẽ vào phần login
    Route::get('dat-hang','Order_detailController@getoder')->name('getoder.get');
});

Route::group(['middleware'=>'CheckRole'],function (){
    Route::get('/user_management', 'Admin_userController@index')->name('user_management.index');
    Route::get('/user_management/add', 'Admin_userController@add')->name('user_management.add');
    Route::get('/user_management/search?nhap=/{search}', 'Admin_userController@search')->name('user_management.search');
    Route::get('search/{search?}', 'Admin_userController@process')->name('admin_userController.process');
    Route::get('filter/status={status?}', 'Admin_userController@status')->name('user_management.status');
    Route::post('change/status/{id}', 'Admin_userController@change')->name('user_management.change');
    Route::resource('/user_management', 'Admin_userController');

    Route::get('filter_status={status?}', 'ProductDetailController@status')->name('producdetail.status');

    // di chuyen tu tren xuong
    Route::resource('/proDetail_management', 'ProductDetailController');
    Route::post('/proDetail_management/change/{id}', 'ProductDetailController@change')->name('proDetail_management.change');
    Route::get('prd_search/{search?}', 'ProductDetailController@process')->name('proDetail_management.process');

    Route::resource('/news_management', 'NewsController');
    Route::post('/news_management/change/{id}', 'NewsController@change')->name('news_management.change');
    Route::get('news_search/{search?}', 'NewsController@process')->name('news_management.process');
    Route::get('filternews_status={status?}', 'NewsController@status')->name('news.status');

    Route::resource('/newscate_management', 'NewsCategoryController');
    Route::get('newscate_search/{search?}', 'NewsCategoryController@process')->name('newscate_management.process');

    Route::resource('/tag_management', 'TagController');
    Route::get('tag_search/{search?}', 'TagController@process')->name('tag_management.process');

    Route::get('/dashboard', 'DashboardController@dashboard');


    //
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/cate_management', 'CategoryController');
    Route::get('cate_search/{search?}', 'CategoryController@process')->name('cate_management.process');

    Route::resource('/product_management', 'ProductController');
    Route::get('pro_search/{search?}', 'ProductController@process')->name('product_management.process');

    Route::get('admin/donhang/detail/{id}',['as'  =>'getdetail','uses' => 'OrderController@getdetail'])->where('id','[0-9]+');
    Route::post('admin/donhang/detail/{id}',['as' =>'postdetail','uses' => 'OrderController@postdetail'])->where('id','[0-9]+');
    Route::get('admin/donhang/deldetail/{id}/{orderStatus}', 'OrderDetailController@getdelDetail')->where('id','[0-9]+');
    Route::get('admin/donhang/delorder/{id}', 'OrderController@getdelOrder')->where('id','[0-9]+');
    Route::resource('/language_management', 'LanguageController');
    Route::get('lang_search/{search?}', 'LanguageController@process')->name('language_management.process');

    Route::resource('/author_management', 'AuthorController');
    Route::get('aut_search/{search?}', 'AuthorController@process')->name('author_management.process');

    Route::resource('/pub_management', 'PublisherController');
    Route::get('pub_search/{search?}', 'PublisherController@process')->name('publisher_management.process');

    Route::resource('/prf_management', 'PriceFilterController');
    Route::get('prf_search/{search?}', 'PriceFilterController@process')->name('prf_management.process');

    Route::resource('/mail_management', 'SubscribeController');

    Route::resource('/mes_management', 'MessageController');
    Route::get('mes_search/{search?}', 'MessageController@process')->name('message_management.process');

});




Route::get('order/confirm', 'OrderController@confirm')->name('order.confirm');
Route::get('order/change_status/{order_id}', 'OrderController@changeStatus')->name('changestatus.order');
Route::resource('order', 'OrderController');
Route::resource('order_detail', 'OrderDetailController');

Route::get('/add_cart/{id}', 'OrderDetailController@addCart')->name('add.cart');
Route::put('order/update/{id?}/{qty?}-{dk?}','OrderDetailController@updateCart')->name('order.updateCart');
Route::get('login_admin', 'Admin_userController@getLogin')->name('login.admin');
Route::get('message', 'Admin_userController@getLogin')->name('message_for_login');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth_login', 'Admin_userController@getLogin')->name('login.admin');

Route::resource('profile', 'ProfileController');


Route::get('frontendsearch/{search?}','FrontendController@search')->name('frontend.search');
