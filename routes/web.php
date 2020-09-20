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

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/home', 'HomeController@index')->name('home.index');

Route::resource('departments', 'DepartmentsController');
Route::resource('employees', 'EmployeesController');
Route::resource('files', 'FilesController');
Route::resource('file-categories', 'FileCategoriesController');
Route::resource('funds', 'FundsController');
Route::resource('investments', 'InvestmentsController');
Route::resource('news', 'NewsController');
Route::resource('notes', 'NotesController');
Route::resource('partners', 'PartnersController');
Route::resource('permissions', 'PermissionsController')->only(['index']);
Route::resource('protectives', 'ProtectivesController');
Route::resource('replies', 'RepliesController')->only(['store', 'destroy']);
Route::resource('risks', 'RisksController');
Route::resource('users', 'UsersController');

Route::get('files/download/{id}', 'FilesController@download')->name('files.download');