<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('auth/logout', 'AuthController@logout');

Route::middleware(['auth'])->group(function () {
	Route::get('/', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');
	Route::get('getReport', 'DashboardController@getReport')->name('dashboards.getReport');

	Route::get('users/datatable', 'UserController@datatable')->name('users.datatable');
	Route::get('users/changePassword', 'UserController@changePassword')->name('users.changePassword');
	Route::post('users/savePassword', 'UserController@savePassword')->name('users.savePassword');
	Route::resource('users', UserController::class);

	Route::get('access_masters/datatable', 'AccessMasterController@datatable')->name('access_masters.datatable');
	Route::resource('access_masters', AccessMasterController::class);

	Route::get('access_groups/datatable', 'AccessGroupController@datatable')->name('access_groups.datatable');
	Route::resource('access_groups', AccessGroupController::class);

	Route::get('companies/datatable', 'CompanyController@datatable')->name('companies.datatable');
	Route::resource('companies', CompanyController::class);

	
	Route::get('courses/{id}/batches', 'CourseBatchController@index')->name('course_batches.index');
	Route::get('courses/{id}/batches/datatable', 'CourseBatchController@datatable')->name('course_batches.datatable');
	Route::get('courses/{id}/batches/create', 'CourseBatchController@create')->name('course_batches.create');
	Route::post('courses/{id}/batches', 'CourseBatchController@store')->name('course_batches.store');
	Route::get('courses/{id}/batches/{id_batch}/edit', 'CourseBatchController@edit')->name('course_batches.edit');
	Route::put('courses/{id}/batches/{id_batch}', 'CourseBatchController@update')->name('course_batches.update');
	Route::get('courses/{id}/batches/{id_batch}', 'CourseBatchController@show')->name('course_batches.show');
	
	Route::post('courses/getById', 'CourseController@getById')->name('courses.getById');
	Route::get('courses/datatable', 'CourseController@datatable')->name('courses.datatable');
	Route::get('courses/filter/{keyword}', 'CourseController@filter')->name('courses.filter');
	Route::resource('courses', CourseController::class);

	Route::post('discounts/getById', 'DiscountController@getById')->name('discounts.getById');
	Route::get('discounts/datatable', 'DiscountController@datatable')->name('discounts.datatable');
	Route::resource('discounts', DiscountController::class);

	Route::get('levels/datatable', 'LevelController@datatable')->name('levels.datatable');
	Route::resource('levels', LevelController::class);

	Route::get('majors/datatable', 'MajorController@datatable')->name('majors.datatable');
	Route::resource('majors', MajorController::class);

	Route::get('moduls/{id}/tutorials', 'ModulTutorialController@index')->name('modul_tutorials.index');
	Route::get('moduls/{id}/tutorials/datatable', 'ModulTutorialController@datatable')->name('modul_tutorials.datatable');
	Route::get('moduls/{id}/tutorials/create', 'ModulTutorialController@create')->name('modul_tutorials.create');
	Route::post('moduls/{id}/tutorials', 'ModulTutorialController@store')->name('modul_tutorials.store');
	Route::get('moduls/{id}/tutorials/{id_tutorial}/edit', 'ModulTutorialController@edit')->name('modul_tutorials.edit');
	Route::put('moduls/{id}/tutorials/{id_tutorial}', 'ModulTutorialController@update')->name('modul_tutorials.update');
	Route::get('moduls/{id}/tutorials/{id_tutorial}', 'ModulTutorialController@show')->name('modul_tutorials.show');

	Route::get('moduls/datatable', 'ModulController@datatable')->name('moduls.datatable');
	Route::resource('moduls', ModulController::class);

	Route::post('packages/getById', 'PackageController@getById')->name('packages.getById');
	Route::get('packages/datatable', 'PackageController@datatable')->name('packages.datatable');
	Route::get('packages/filter/{keyword}', 'PackageController@filter')->name('packages.filter');
	Route::resource('packages', PackageController::class);

	Route::get('tutors/datatable', 'TutorController@datatable')->name('tutors.datatable');
	Route::resource('tutors', TutorController::class);

	Route::post('members/getById', 'MemberController@getById')->name('members.getById');
	Route::get('members/datatable', 'MemberController@datatable')->name('members.datatable');
	Route::get('members/filter/{keyword}', 'MemberController@filter')->name('members.filter');
	Route::resource('members', MemberController::class);

	Route::resource('generals', GeneralController::class);

	Route::get('user_failed_attemps/datatable', 'UserFailedAttemptController@datatable')->name('user_failed_attempts.datatable');
	Route::resource('user_failed_attempts', UserFailedAttemptController::class);

	Route::get('user_logs/datatable', 'UserLogController@datatable')->name('user_logs.datatable');
	Route::resource('user_logs', UserLogController::class);

	Route::get('order_courses/datatable', 'OrderCourseController@datatable')->name('order_courses.datatable');
	Route::post('order_courses/forced', 'OrderCourseController@forced')->name('order_courses.forced');
	Route::post('order_courses/getById', 'OrderCourseController@getById')->name('order_courses.getById');
	Route::post('order_courses/getByCourseId', 'OrderCourseController@getByCourseId')->name('order_courses.getByCourseId');
	Route::resource('order_courses', OrderCourseController::class);

	Route::get('banks/datatable', 'BankController@datatable')->name('banks.datatable');
	Route::resource('banks', BankController::class);

	Route::get('bank_accounts/datatable', 'BankAccountController@datatable')->name('bank_accounts.datatable');
	Route::resource('bank_accounts', BankAccountController::class);

	Route::get('order_confirms/datatable', 'OrderConfirmController@datatable')->name('order_confirms.datatable');
	Route::post('order_confirms/verified', 'OrderConfirmController@verified')->name('order_confirms.verified');
	Route::resource('order_confirms', OrderConfirmController::class);

	Route::get('payment_types/datatable', 'PaymentTypeController@datatable')->name('payment_types.datatable');
	Route::resource('payment_types', PaymentTypeController::class);

	Route::get('reports/order_report', 'ReportController@order_report')->name('reports.orderReport');
	Route::post('reports/generate_order_report', 'ReportController@generate_order_report')->name('reports.generateOrderReport');

	Route::get('reports/confirm_order_report', 'ReportController@confirm_order_report')->name('reports.confirmOrderReport');
	Route::post('reports/generate_confirm_order_report', 'ReportController@generate_confirm_order_report')->name('reports.generateConfirmOrderReport');

	Route::get('messages/datatable', 'MessageController@datatable')->name('messages.datatable');
	Route::resource('messages', MessageController::class);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
