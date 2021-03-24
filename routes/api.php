<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'job'

], function ($router) {
    Route::post('jobpost', 'JobController@jobpost');
    Route::get('get-country', 'JobController@getCountry');
    Route::get('get-category', 'JobController@getCategory');
});

Route::group([
    'middleware' => 'api'
], function ($router) {
    Route::get('banner/get-banner', 'BannerController@getBanner');
});