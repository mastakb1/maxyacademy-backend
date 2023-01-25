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

	// MASTER ROUTE
	Route::get('banks/datatable', 'BankController@datatable')->name('banks.datatable');
	Route::resource('banks', BankController::class);

	Route::get('bank_accounts/datatable', 'BankAccountController@datatable')->name('bank_accounts.datatable');
	Route::resource('bank_accounts', BankAccountController::class);

	Route::get('payment_types/datatable', 'PaymentTypeController@datatable')->name('payment_types.datatable');
	Route::resource('payment_types', PaymentTypeController::class);

	Route::get('course_types/datatable', 'CourseTypeController@datatable')->name('course_types.datatable');
	Route::resource('course_types', CourseTypeController::class);

	Route::get('difficulty_types/datatable', 'DifficultyTypeController@datatable')->name('difficulty_types.datatable');
	Route::resource('difficulty_types', DifficultyTypeController::class);

	Route::get('tutors/datatable', 'TutorController@datatable')->name('tutors.datatable');
	Route::resource('tutors', TutorController::class);

	Route::get('companies/datatable', 'CompanyController@datatable')->name('companies.datatable');
	Route::resource('companies', CompanyController::class);

	Route::get('messages/datatable', 'MessageController@datatable')->name('messages.datatable');
	Route::resource('messages', MessageController::class);
	
	Route::get('content_carousel/datatable', 'ContentCarouselController@datatable')->name('content_carousels.datatable');
	Route::resource('content_carousels', ContentCarouselController::class);

	Route::get('section/datatable', 'MSectionController@datatable')->name('sections.datatable');
	Route::resource('sections', MSectionController::class);
	
	Route::get('section/datatable', 'MSectionController@datatable')->name('sections.datatable');
	Route::resource('sections', MSectionController::class);

	Route::get('program_step/datatable', 'MProgramStepController@datatable')->name('program_steps.datatable');
	Route::resource('program_steps', MProgramStepController::class);

	Route::post('members/getById', 'MemberController@getById')->name('members.getById');
	Route::get('members/datatable', 'MemberController@datatable')->name('members.datatable');
	Route::get('members/filter/{keyword}', 'MemberController@filter')->name('members.filter');
	Route::resource('members', MemberController::class);
	// END MASTER ROUTE

	// COURSE ROUTE
	Route::get('course_classes/filter/{keyword}', 'CourseClassController@filter')->name('course_classes.filter');
	Route::get('courses/{id}/classes', 'CourseClassController@index')->name('course_classes.index');
	Route::get('courses/{id}/classes/datatable', 'CourseClassController@datatable')->name('course_classes.datatable');
	Route::get('courses/{id}/classes/create', 'CourseClassController@create')->name('course_classes.create');
	Route::post('courses/{id}/classes', 'CourseClassController@store')->name('course_classes.store');
	Route::get('courses/{id}/classes/{id_course_class}/edit', 'CourseClassController@edit')->name('course_classes.edit');
	Route::put('courses/{id}/classes/{id_course_class}', 'CourseClassController@update')->name('course_classes.update');
	Route::get('courses/{id}/classes/{id_course_class}', 'CourseClassController@show')->name('course_classes.show');
	Route::get('courses/{id}/classes/{id_course_class}/manage_module', 'CourseClassController@manage_module')->name('course_classes.manage_module');
	Route::post('courses/{id}/classes/{id_course_class}/manage_module', 'CourseClassController@store_module')->name('course_classes.store_module');

	Route::post('courses/getById', 'CourseController@getById')->name('courses.getById');
	Route::get('courses/filter/{keyword}', 'CourseController@filter')->name('courses.filter');
	Route::get('courses/datatable', 'CourseController@datatable')->name('courses.datatable');
	Route::resource('courses', CourseController::class);

	Route::get('course_modules/{id}/childs', 'CourseModuleChildController@index')->name('course_module_childs.index');
	Route::get('course_modules/{id}/childs/datatable', 'CourseModuleChildController@datatable')->name('course_module_childs.datatable');
	Route::get('course_modules/{id}/childs/create', 'CourseModuleChildController@create')->name('course_module_childs.create');
	Route::post('course_modules/{id}/childs', 'CourseModuleChildController@store')->name('course_module_childs.store');
	Route::get('course_modules/{id}/childs/{id_child}/edit', 'CourseModuleChildController@edit')->name('course_module_childs.edit');
	Route::put('course_modules/{id}/childs/{id_child}', 'CourseModuleChildController@update')->name('course_module_childs.update');
	Route::get('course_modules/{id}/childs/{id_child}', 'CourseModuleChildController@show')->name('course_module_childs.show');

	Route::get('course_modules/datatable', 'CourseModuleController@datatable')->name('course_modules.datatable');
	Route::resource('course_modules', CourseModuleController::class);

	Route::post('course_prices/getById', 'CoursePriceController@getById')->name('course_prices.getById');
	Route::get('course_prices/filter/{keyword}', 'CoursePriceController@filter')->name('course_prices.filter');
	Route::get('course_prices/datatable', 'CoursePriceController@datatable')->name('course_prices.datatable');
	Route::resource('course_prices', CoursePriceController::class);
	// END COURSE ROUTE

	// TRANSACTION ROUTE
	Route::post('promotions/getById', 'PromotionController@getById')->name('promotions.getById');
	Route::get('promotions/datatable', 'PromotionController@datatable')->name('promotions.datatable');
	Route::get('promotions/filter/{keyword}', 'PromotionController@filter')->name('promotions.filter');
	Route::resource('promotions', PromotionController::class);

	Route::post('orders/forced', 'OrderController@forced')->name('orders.forced');
	Route::post('orders/getByCourseId', 'OrderController@getByCourseId')->name('orders.getByCourseId');
	Route::post('orders/getById', 'OrderController@getById')->name('orders.getById');
	Route::get('orders/datatable', 'OrderController@datatable')->name('orders.datatable');
	Route::resource('orders', OrderController::class);

	Route::post('order_confirms/verified', 'OrderConfirmController@verified')->name('order_confirms.verified');
	Route::get('order_confirms/datatable', 'OrderConfirmController@datatable')->name('order_confirms.datatable');
	Route::resource('order_confirms', OrderConfirmController::class);
	// END TRANSACTION ROUTE

	// REPORT ROUTE
	Route::get('reports/order_report', 'ReportController@order_report')->name('reports.orderReport');
	Route::post('reports/generate_order_report', 'ReportController@generate_order_report')->name('reports.generateOrderReport');

	Route::get('reports/confirm_order_report', 'ReportController@confirm_order_report')->name('reports.confirmOrderReport');
	Route::post('reports/generate_confirm_order_report', 'ReportController@generate_confirm_order_report')->name('reports.generateConfirmOrderReport');
	// END REPORT ROUTE

	// USER ROUTE
	Route::get('users/datatable', 'UserController@datatable')->name('users.datatable');
	Route::get('users/changePassword', 'UserController@changePassword')->name('users.changePassword');
	Route::post('users/savePassword', 'UserController@savePassword')->name('users.savePassword');
	Route::resource('users', UserController::class);

	Route::get('access_masters/datatable', 'AccessMasterController@datatable')->name('access_masters.datatable');
	Route::resource('access_masters', AccessMasterController::class);

	Route::get('access_groups/datatable', 'AccessGroupController@datatable')->name('access_groups.datatable');
	Route::resource('access_groups', AccessGroupController::class);

	Route::get('user_failed_attemps/datatable', 'UserFailedAttemptController@datatable')->name('user_failed_attempts.datatable');
	Route::resource('user_failed_attempts', UserFailedAttemptController::class);

	Route::get('user_logs/datatable', 'UserLogController@datatable')->name('user_logs.datatable');
	Route::resource('user_logs', UserLogController::class);
	// END USER ROUTE

	// SETTING ROUTE
	Route::resource('generals', GeneralController::class);
	// END SETTING ROUTE

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
