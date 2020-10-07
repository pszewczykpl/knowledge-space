<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileCategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProtectiveController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UpdatePasswordController;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('departments', DepartmentController::class);
Route::get('employees/duplicate/{employee}', [EmployeeController::class, 'duplicate'])->name('employees.duplicate');
Route::resource('employees', EmployeeController::class);
Route::get('files/download/{id}', [FileController::class, 'download'])->name('files.download');
Route::resource('files', FileController::class);
Route::resource('file-categories', FileCategoryController::class);
Route::get('funds/duplicate/{fund}', [FundController::class, 'duplicate'])->name('funds.duplicate');
Route::resource('funds', FundController::class);
Route::get('investments/duplicate/{investment}', [InvestmentController::class, 'duplicate'])->name('investments.duplicate');
Route::resource('investments', InvestmentController::class);
Route::resource('news', NewsController::class);
Route::resource('notes', NoteController::class);
Route::get('partners/duplicate/{partner}', [PartnerController::class, 'duplicate'])->name('partners.duplicate');
Route::resource('partners', PartnerController::class);
Route::resource('permissions', PermissionController::class)->only(['index']);
Route::get('protectives/duplicate/{protective}', [ProtectiveController::class, 'duplicate'])->name('protectives.duplicate');
Route::resource('protectives', ProtectiveController::class);
Route::resource('replies', ReplyController::class)->only(['store', 'destroy']);
Route::get('risks/duplicate/{risk}', [RiskController::class, 'duplicate'])->name('risks.duplicate');
Route::resource('risks', RiskController::class);
Route::put('password/update', [UpdatePasswordController::class, 'update'])->name('password.update');
Route::get('password/update', [UpdatePasswordController::class, 'index'])->name('password.index');
Route::resource('users', UserController::class);