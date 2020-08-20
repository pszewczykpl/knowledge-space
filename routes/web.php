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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/home', 'HomeController@index')->name('home.index');

/**
 * Auth Routes
 */
Auth::routes();

/**
 * Users Routes
 */
Route::resource('users', 'UsersController');

/**
 * Permissions Routes
 */
Route::resource('permissions', 'PermissionsController')->only(['index']);

/**
 * Investments Routes
 */
Route::resource('investments', 'InvestmentsController');

/**
 * Employees Routes
 */
Route::resource('employees', 'EmployeesController');

/**
 * Protectives Routes
 */
Route::resource('protectives', 'ProtectivesController');

/**
 * Funds Routes
 */
Route::resource('funds', 'FundsController');

/**
 * Partners Routes
 */
Route::resource('partners', 'PartnersController');

/**
 * Risks Routes
 */
Route::resource('risks', 'RisksController');

/**
 * Files Routes
 */
Route::get('files/download/{id}', 'FilesController@download')->name('files.download');
Route::resource('files', 'FilesController');

/**
 * Notes Routes
 */
Route::resource('notes', 'NotesController');

/**
 * News Routes
 */
Route::resource('news', 'NewsController');

/**
 * Replies Routes
 */
Route::resource('replies', 'RepliesController')->only(['store', 'destroy']);