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

Route::get('/', 'IndexController@welcome')->name('home');
Route::post('/subscribe/user', 'IndexController@subscribe');
Route::get('users/{user}/{token}/confirm', 'IndexController@confirm')->name('confirm.email');
Route::get('/buy-subscription', 'PaymentController@buy_subscription')->name('buy.subscription');
Route::post('/buy-subscription', 'PaymentController@buy')->name('buy');
Route::get('/buy-subscription-success', 'PaymentController@buy_success');
Route::get('/buy-subscription-error', 'PaymentController@buy_error');

Route::get('/buy-course', 'PaymentController@show_course')->name('show.course');
Route::post('/buy-course', 'PaymentController@buy_course')->name('buy.course');

Route::get('/buy-consultation', 'PaymentController@show_consultation')->name('show.consultation');
Route::post('/buy-consultation', 'PaymentController@buy_consultation')->name('buy.consultation');

Route::get('/buy-course-success', 'PaymentController@buy_course_success');
Route::get('/buy-consultation-success', 'PaymentController@buy_consultation_success');
