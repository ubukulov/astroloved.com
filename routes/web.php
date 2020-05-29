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
Route::get('/confirmation-email', 'IndexController@confirmation')->name('confirmation');

# Subscription routes
Route::group(['namespace' => 'Payment'], function(){
    Route::get('/buy-subscription', 'SubscriptionController@buy_subscription')->name('buy.subscription');
    Route::post('/buy-subscription', 'SubscriptionController@buy')->name('buy');
    Route::get('/buy-subscription-success', 'SubscriptionController@buy_success');
    Route::get('/buy-subscription-error', 'SubscriptionController@buy_error');

# Course routes
    Route::get('/buy-course', 'CourseController@show_course')->name('show.course');
    Route::post('/buy-course', 'CourseController@buy_course')->name('buy.course');
    Route::get('/buy-course-success', 'CourseController@buy_course_success');

# Consultation routes
    Route::get('/buy-consultation', 'ConsultationController@show_consultation')->name('show.consultation');
    Route::post('/buy-consultation', 'ConsultationController@buy_consultation')->name('buy.consultation');
    Route::get('/buy-consultation-success', 'ConsultationController@buy_consultation_success');
});
