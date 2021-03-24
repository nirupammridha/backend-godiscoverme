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
     return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth:web','is_admin']], function () {
	Route::get('/admin-dashboard', 'HomeController@admin_dashboard')->name('admin.home');
	Route::get('admin/user/list-user', 'UserController@user_list')->name('list.user');
	Route::get('admin/user/add-user', 'UserController@user_add')->name('add.user');
	Route::post('admin/user/create-user', 'UserController@user_create')->name('create.user');
	Route::get('admin/user/edit-user/{id}', 'UserController@user_edit')->name('edit.user');
	Route::get('admin/user/delete-user/{id}', 'UserController@deleteUser')->name('delete.user');
	Route::get('admin/user/social-links/{id}', 'UserController@social_links')->name('social.links');
	Route::get('admin/user/contacts/{id}', 'UserController@contacts')->name('user.contacts');
	Route::post('admin/user/update-social-links', 'UserController@update_social_links')->name('update.social.links');
	Route::post('admin/user/update-contacts', 'UserController@update_contacts')->name('update.contacts');
	Route::post('admin/user/update-user', 'UserController@update_user')->name('update.user');

	Route::get('admin/more/list-help', 'AdminController@help_list')->name('list.help');
	Route::get('admin/more/add-help', 'AdminController@help_add')->name('add.help');
	Route::post('admin/more/create-help', 'AdminController@help_create')->name('create.help');
	Route::get('admin/more/edit-help/{id}', 'AdminController@help_edit')->name('edit.help');
	Route::post('admin/more/update-help', 'AdminController@update_help')->name('update.help');

	Route::get('admin/more/list-terms', 'AdminController@terms_list')->name('list.terms');
	Route::get('admin/more/add-terms', 'AdminController@terms_add')->name('add.terms');
	Route::post('admin/more/create-terms', 'AdminController@terms_create')->name('create.terms');
	Route::get('admin/more/edit-terms/{id}', 'AdminController@terms_edit')->name('edit.terms');
	Route::post('admin/more/update-terms', 'AdminController@update_terms')->name('update.terms');

	Route::get('admin/more/list-safties', 'AdminController@safties_list')->name('list.safties');
	Route::get('admin/more/add-safties', 'AdminController@safties_add')->name('add.safties');
	Route::post('admin/more/create-safties', 'AdminController@safties_create')->name('create.safties');
	Route::get('admin/more/edit-safties/{id}', 'AdminController@safties_edit')->name('edit.safties');
	Route::post('admin/more/update-safties', 'AdminController@update_safties')->name('update.safties');

	Route::get('admin/more/list-level', 'AdminController@level_list')->name('list.level');
	Route::get('admin/more/add-level', 'AdminController@level_add')->name('add.level');
	Route::post('admin/more/create-level', 'AdminController@level_create')->name('create.level');
	Route::get('admin/more/edit-level/{id}', 'AdminController@level_edit')->name('edit.level');
	Route::post('admin/more/update-level', 'AdminController@update_level')->name('update.level');
	Route::get('admin/more/delete-level/{id}', 'AdminController@level_delete')->name('delete.level');

	Route::get('admin/more/list-banner', 'BannerController@banner_list')->name('list.banner');
	Route::get('admin/more/add-banner', 'BannerController@banner_add')->name('add.banner');
	Route::post('admin/more/create-banner', 'BannerController@banner_create')->name('create.banner');
	Route::get('admin/more/edit-banner/{id}', 'BannerController@banner_edit')->name('edit.banner');
	Route::post('admin/more/update-banner', 'BannerController@update_banner')->name('update.banner');
	Route::get('admin/more/delete-banner/{id}', 'BannerController@banner_delete')->name('delete.banner');

	Route::get('admin/more/list-testimonial', 'TestimonialController@testimonial_list')->name('list.testimonial');
	Route::get('admin/more/testimonial', 'TestimonialController@testimonial')->name('testimonial');
	Route::any('admin/more/testimonial/create', 'TestimonialController@testimonial_create')->name('testimonial_create');
	Route::get('admin/more/edit-testimonial/{id}', 'TestimonialController@edit_testimonial')->name('edit.testimonial');
	Route::post('admin/more/update-testimonial', 'TestimonialController@update_testimonial')->name('update.testimonial');
});
