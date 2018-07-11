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


Route::put('/testimonials/updateAll', 'TestimonialController@update')->name('testimonials.update');
Route::get('/testimonials', 'TestimonialController@index')->name('admin.testimonials.index');