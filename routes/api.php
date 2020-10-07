<?php

use Illuminate\Http\Request;

use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\FileCategoryController;
use App\Http\Controllers\API\FileController;
use App\Http\Controllers\API\FundController;
use App\Http\Controllers\API\InvestmentByController;
use App\Http\Controllers\API\InvestmentController;
use App\Http\Controllers\API\InvestmentFundController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\ProtectiveController;
use App\Http\Controllers\API\ProtectiveByController;
use App\Http\Controllers\API\RiskController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SystemController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

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
Route::post('datatables/departments', [DepartmentController::class, 'datatables']);
Route::post('datatables/employees', [EmployeeController::class, 'datatables']);
Route::post('datatables/files', [FileController::class, 'datatables']);
Route::post('datatables/file-categories', [FileCategoryController::class, 'datatables']);
Route::post('datatables/funds', [FundController::class, 'datatables']);
Route::post('datatables/investments', [InvestmentController::class, 'datatables']);
Route::post('datatables/investment/{id}/funds', [InvestmentFundController::class, 'datatables']);
Route::post('datatables/notes', [NoteController::class, 'datatables']);
Route::post('datatables/partners', [PartnerController::class, 'datatables']);
Route::post('datatables/permissions', [PermissionController::class, 'datatables']);
Route::post('datatables/protectives', [ProtectiveController::class, 'datatables']);
Route::post('datatables/risks', [RiskController::class, 'datatables']);
Route::post('datatables/users', [UserController::class, 'datatables']);
Route::post('datatables/systems', [SystemController::class, 'datatables']);

Route::get('files/zip', [FileController::class, 'zip'])->name('files.zip');

Route::get('investments/{id}/files/zip', [InvestmentController::class, 'zip_files']);
Route::get('protectives/{id}/files/zip', [ProtectiveController::class, 'zip_files']);
Route::get('employees/{id}/files/zip', [EmployeeController::class, 'zip_files']);

/* OLAF Controllers */
Route::get('1/{file_code}/{code_toil}/{start_date}', [InvestmentByController::class, 'file_by_toil']);
Route::get('2/{file_code}/{code}/{dist_short}/{start_date}', [ProtectiveByController::class, 'file_by_code']);
Route::get('4/{category_id}/{code_toil}/{start_date}/zip', [InvestmentByController::class, 'files_category_by_toil_zip']);
Route::get('5/{category_id}/{code}/{dist_short}/{start_date}/zip', [ProtectiveByController::class, 'files_category_by_code_zip']);