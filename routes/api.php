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
use App\Http\Controllers\API\PostCategoryController;
use App\Http\Controllers\API\BancassuranceController;

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

/**
 * API routes for datatables.net (https://datatables.net/manual/server-side)
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
Route::post('datatables/bancassurances', [BancassuranceController::class, 'datatables']);
Route::post('datatables/risks', [RiskController::class, 'datatables']);
Route::post('datatables/users', [UserController::class, 'datatables']);
Route::post('datatables/systems', [SystemController::class, 'datatables']);
Route::post('datatables/post-categories', [PostCategoryController::class, 'datatables']);

/**
 * Generating a zip file with files.
 */
Route::get('files/zip', [FileController::class, 'zip'])->name('files.zip');

/**
 * Generating a zip file with files by product.
 */
Route::get('investments/{investment}/files/zip', [InvestmentController::class, 'zipFiles'])->name('investments.files.zip');
Route::get('protectives/{protective}/files/zip', [ProtectiveController::class, 'zipFiles'])->name('protectives.files.zip');
Route::get('bancassurances/{bancassurance}/files/zip', [BancassuranceController::class, 'zipFiles'])->name('bancassurances.files.zip');
Route::get('employees/{employee}/files/zip', [EmployeeController::class, 'zipFiles'])->name('employees.files.zip');

/**
 * Get file by: file_code, code_toil, start_date and other parameters.
 */
Route::get('1/{file_code}/{code_toil}/{start_date}', [InvestmentByController::class, 'file_by_toil']);
Route::get('2/{file_code}/{code}/{dist_short}/{start_date}', [ProtectiveByController::class, 'file_by_code']);

/**
 * Get files like a zip file by: file_code, code_toil, start_date and other parameters.
 */
Route::get('4/{category_id}/{code_toil}/{start_date}/zip', [InvestmentByController::class, 'files_category_by_toil_zip']);
Route::get('5/{category_id}/{code}/{dist_short}/{start_date}/zip', [ProtectiveByController::class, 'files_category_by_code_zip']);