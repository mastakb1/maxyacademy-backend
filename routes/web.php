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
	
	Route::get('courses/datatable', 'CourseController@datatable')->name('courses.datatable');
	Route::resource('courses', CourseController::class);

	Route::get('discounts/datatable', 'DiscountController@datatable')->name('discounts.datatable');
	Route::resource('discounts', DiscountController::class);

	Route::get('durations/datatable', 'DurationController@datatable')->name('durations.datatable');
	Route::resource('durations', DurationController::class);

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

	Route::get('packages/datatable', 'PackageController@datatable')->name('packages.datatable');
	Route::resource('packages', PackageController::class);

	Route::get('tutors/datatable', 'TutorController@datatable')->name('tutors.datatable');
	Route::resource('tutors', TutorController::class);

	Route::get('members/datatable', 'MemberController@datatable')->name('members.datatable');
	Route::resource('members', MemberController::class);

	Route::resource('generals', GeneralController::class);

	Route::get('user_failed_attemps/datatable', 'UserFailedAttemptController@datatable')->name('user_failed_attempts.datatable');
	Route::resource('user_failed_attempts', UserFailedAttemptController::class);

	Route::get('user_logs/datatable', 'UserLogController@datatable')->name('user_logs.datatable');
	Route::resource('user_logs', UserLogController::class);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
