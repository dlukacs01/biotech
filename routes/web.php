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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminsController@index')->name('admin.index');

    Route::get('/admin/campaigns', 'CampaignController@index')->name('campaign.index');
    Route::get('/admin/campaigns/create', 'CampaignController@create')->name('campaign.create');
    Route::post('/admin/campaigns', 'CampaignController@store')->name('campaign.store');

    Route::get('/admin/products', 'ProductController@index')->name('product.index');
    Route::get('/admin/products/create', 'ProductController@create')->name('product.create');
    Route::post('/admin/products', 'ProductController@store')->name('product.store');

    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');

    Route::get('/admin/coupons', 'CouponController@index')->name('coupon.index');
    Route::get('/admin/coupons/create', 'CouponController@create')->name('coupon.create');
    Route::post('/admin/coupons', 'CouponController@store')->name('coupon.store');

    Route::get('/admin/statuses', 'StatusController@index')->name('status.index');
    Route::post('/admin/statuses', 'StatusController@store')->name('status.store');
});
