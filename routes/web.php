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
    Route::put('/admin/campaigns/{campaign}/publish', 'CampaignController@publish')->name('campaign.publish');

    Route::get('/admin/products', 'ProductController@index')->name('product.index');
    Route::get('/admin/products/create', 'ProductController@create')->name('product.create');
    Route::post('/admin/products', 'ProductController@store')->name('product.store');
    Route::get('/admin/products/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::patch('/admin/products/{product}/update', 'ProductController@update')->name('product.update');
    Route::put('/admin/products/{product}/publish', 'ProductController@publish')->name('product.publish');
    Route::put('/admin/products/{product}/attach', 'ProductController@attach')->name('product.campaign.attach');
    Route::put('/admin/products/{product}/detach', 'ProductController@detach')->name('product.campaign.detach');

    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');
    Route::put('/admin/posts/{post}/publish', 'PostController@publish')->name('post.publish');
    Route::put('/admin/posts/{post}/attach', 'PostController@attach')->name('post.campaign.attach');
    Route::put('/admin/posts/{post}/detach', 'PostController@detach')->name('post.campaign.detach');

    Route::get('/admin/coupons', 'CouponController@index')->name('coupon.index');
    Route::get('/admin/coupons/create', 'CouponController@create')->name('coupon.create');
    Route::post('/admin/coupons', 'CouponController@store')->name('coupon.store');
    Route::get('/admin/coupons/{coupon}/edit', 'CouponController@edit')->name('coupon.edit');
    Route::patch('/admin/coupons/{coupon}/update', 'CouponController@update')->name('coupon.update');
    Route::put('/admin/coupons/{coupon}/publish', 'CouponController@publish')->name('coupon.publish');
    Route::put('/admin/coupons/{coupon}/attach', 'CouponController@attach')->name('coupon.campaign.attach');
    Route::put('/admin/coupons/{coupon}/detach', 'CouponController@detach')->name('coupon.campaign.detach');

    Route::get('/admin/statuses', 'StatusController@index')->name('status.index');
    Route::post('/admin/statuses', 'StatusController@store')->name('status.store');
});
