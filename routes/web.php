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
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UpdatePasswordController;

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

Route::delete('departments/{id}/forcedestroy', [DepartmentController::class, 'force_destroy'])->name('departments.forceDestroy');
Route::put('departments/{id}/restore', [DepartmentController::class, 'restore'])->name('departments.restore');
Route::resource('departments', DepartmentController::class);

Route::delete('employees/{id}/forcedestroy', [EmployeeController::class, 'force_destroy'])->name('employees.forceDestroy');
Route::put('employees/{id}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');
Route::get('employees/{employee}/duplicate', [EmployeeController::class, 'duplicate'])->name('employees.duplicate');
Route::resource('employees', EmployeeController::class);

Route::delete('files/{id}/forcedestroy', [FileController::class, 'force_destroy'])->name('files.forceDestroy');
Route::put('files/{id}/restore', [FileController::class, 'restore'])->name('files.restore');
Route::get('files/{file}/download', [FileController::class, 'download'])->name('files.download');
Route::get('files/{file}/{fileable_type}/{fileable_id}/detach', [FileController::class, 'detach'])->name('files.detach');
Route::get('files/{file}/{fileable_type}/{fileable_id}/replace', [FileController::class, 'replace'])->name('files.replace');
Route::resource('files', FileController::class);

Route::delete('file-categories/{id}/forcedestroy', [FileCategoryController::class, 'force_destroy'])->name('file-categories.forceDestroy');
Route::put('file-categories/{id}/restore', [FileCategoryController::class, 'restore'])->name('file-categories.restore');
Route::resource('file-categories', FileCategoryController::class);

Route::delete('funds/{id}/forcedestroy', [FundController::class, 'force_destroy'])->name('funds.forceDestroy');
Route::put('funds/{id}/restore', [FundController::class, 'restore'])->name('funds.restore');
Route::get('funds/{fund}/duplicate', [FundController::class, 'duplicate'])->name('funds.duplicate');
Route::resource('funds', FundController::class);

Route::delete('investments/{id}/forcedestroy', [InvestmentController::class, 'force_destroy'])->name('investments.forceDestroy');
Route::put('investments/{id}/restore', [InvestmentController::class, 'restore'])->name('investments.restore');
Route::get('investments/{investment}/duplicate', [InvestmentController::class, 'duplicate'])->name('investments.duplicate');
Route::resource('investments', InvestmentController::class);

Route::delete('news/{id}/forcedestroy', [NewsController::class, 'force_destroy'])->name('news.forceDestroy');
Route::put('news/{id}/restore', [NewsController::class, 'restore'])->name('news.restore');
Route::resource('news', NewsController::class);

Route::delete('notes/{id}/forcedestroy', [NoteController::class, 'force_destroy'])->name('notes.forceDestroy');
Route::put('notes/{id}/restore', [NoteController::class, 'restore'])->name('notes.restore');
Route::get('notes/{note}/{noteable_type}/{noteable_id}/detach', [NoteController::class, 'detach'])->name('notes.detach');
Route::resource('notes', NoteController::class);

Route::delete('partners/{id}/forcedestroy', [PartnerController::class, 'force_destroy'])->name('partners.forceDestroy');
Route::put('partners/{id}/restore', [PartnerController::class, 'restore'])->name('partners.restore');
Route::get('partners/{partner}/duplicate', [PartnerController::class, 'duplicate'])->name('partners.duplicate');
Route::resource('partners', PartnerController::class);

Route::resource('permissions', PermissionController::class)->only(['index']);

Route::delete('protectives/{id}/forcedestroy', [ProtectiveController::class, 'force_destroy'])->name('protectives.forceDestroy');
Route::put('protectives/{id}/restore', [ProtectiveController::class, 'restore'])->name('protectives.restore');
Route::get('protectives/{protective}/duplicate', [ProtectiveController::class, 'duplicate'])->name('protectives.duplicate');
Route::resource('protectives', ProtectiveController::class);

Route::delete('reply/{id}/forcedestroy', [ReplyController::class, 'force_destroy'])->name('replies.forceDestroy');
Route::put('reply/{id}/restore', [ReplyController::class, 'restore'])->name('replies.restore');
Route::resource('replies', ReplyController::class)->only(['store', 'destroy']);

Route::delete('risks/{id}/forcedestroy', [RiskController::class, 'force_destroy'])->name('risks.forceDestroy');
Route::put('risks/{id}/restore', [RiskController::class, 'restore'])->name('risks.restore');
Route::get('risks/{risk}/duplicate', [RiskController::class, 'duplicate'])->name('risks.duplicate');
Route::resource('risks', RiskController::class);

Route::delete('users/{id}/forcedestroy', [UserController::class, 'force_destroy'])->name('users.forceDestroy');
Route::put('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::resource('users', UserController::class);

Route::delete('systems/{id}/forcedestroy', [SystemController::class, 'force_destroy'])->name('systems.forceDestroy');
Route::put('systems/{id}/restore', [SystemController::class, 'restore'])->name('systems.restore');
Route::resource('systems', SystemController::class);

Route::get('trash/{model}', [TrashController::class, 'index'])->name('trash.index');