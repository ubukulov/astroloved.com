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
Route::get('/my-ip', 'IndexController@my_ip');

# Subscription routes
Route::group(['namespace' => 'Payment'], function(){
    Route::get('/buy-subscription', 'SubscriptionController@buy_subscription')->name('buy.subscription');
    Route::post('/buy-subscription', 'SubscriptionController@buy')->name('buy');
    Route::get('/buy-subscription-success', 'SubscriptionController@buy_success');
    Route::get('/success-subscription-week', 'SubscriptionController@week')->name('subs.week');
    Route::get('/success-subscription-month', 'SubscriptionController@month')->name('subs.month');
    Route::get('/success-subscription-year', 'SubscriptionController@year')->name('subs.year');
    Route::get('/buy-subscription-error', 'SubscriptionController@buy_error');

# Course routes
    Route::get('/buy-course', 'CourseController@show_course')->name('show.course');
    Route::post('/buy-course', 'CourseController@buy_course')->name('buy.course');
    Route::get('/buy-course-success', 'CourseController@buy_course_success');
    Route::get('/buy-course-error', 'CourseController@buy_course_error');
    Route::get('/success-course', 'CourseController@course_success')->name('course.success');

# Consultation routes
    Route::get('/buy-consultation', 'ConsultationController@show_consultation')->name('show.consultation');
    Route::post('/buy-consultation', 'ConsultationController@buy_consultation')->name('buy.consultation');
    Route::get('/buy-consultation-new', 'ConsultationController@show_consultation_new')->name('show.consultation.new');
    Route::post('/buy-consultation-new', 'ConsultationController@buy_consultation_new')->name('buy.consultation.new');
    Route::get('/buy-consultation-new/success', 'ConsultationController@get_consultation_success');
    Route::get('/buy-consultation-success', 'ConsultationController@buy_consultation_success');
    Route::get('/buy-consultation-error', 'ConsultationController@buy_error');
    Route::get('/success-consultation1', 'ConsultationController@consul_one')->name('consul.one');
    Route::get('/success-consultation2', 'ConsultationController@consul_two')->name('consul.two');

# Robocassa
    Route::get('/robokassa/success/payment', 'RoboController@success_payment')->name('robo.success.payment');
    Route::get('/robokassa/fail/payment', 'RoboController@fail_payment')->name('robo.fail.payment');
});
