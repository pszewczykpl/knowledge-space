<?php

use Illuminate\Http\Request;

use App\Investment;
use App\FileCategory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
| Datatables.net POST controllers
*/
Route::post('datatables/departments', 'API\DepartmentsController@datatables');
Route::post('datatables/employees', 'API\EmployeesController@datatables');
Route::post('datatables/files', 'API\FilesController@datatables');
Route::post('datatables/file-categories', 'API\FileCategoriesController@datatables');
Route::post('datatables/funds', 'API\FundsController@datatables');
Route::post('datatables/investments', 'API\InvestmentsController@datatables');
Route::post('datatables/investment/{id}/funds', 'API\InvestmentFundsController@datatables');
Route::post('datatables/notes', 'API\NotesController@datatables');
Route::post('datatables/partners', 'API\PartnersController@datatables');
Route::post('datatables/permissions', 'API\PermissionsController@datatables');
Route::post('datatables/protectives', 'API\ProtectivesController@datatables');
Route::post('datatables/risks', 'API\RisksController@datatables');
Route::post('datatables/users', 'API\UsersController@datatables');

Route::get('files/zip', 'API\FilesController@zip')->name('files.zip');

Route::get('investments/{id}/files/zip', 'API\InvestmentsController@zip_files');
Route::get('protectives/{id}/files/zip', 'API\ProtectivesController@zip_files');
Route::get('employees/{id}/files/zip', 'API\EmployeesController@zip_files');

/* OLAF Controllers */
Route::get('1/{file_code}/{code_toil}/{start_date}', 'API\InvestmentsByController@file_by_toil');
Route::get('2/{file_code}/{code}/{dist_short}/{start_date}', 'API\ProtectivesByController@file_by_code');
Route::get('4/{category_id}/{code_toil}/{start_date}/zip', 'API\InvestmentsByController@files_category_by_toil_zip');
Route::get('5/{category_id}/{code}/{dist_short}/{start_date}/zip', 'API\ProtectivesByController@files_category_by_code_zip');