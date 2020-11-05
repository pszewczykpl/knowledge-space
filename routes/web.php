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

Route::resource('departments', DepartmentController::class);

Route::get('employees/{employee}/duplicate', [EmployeeController::class, 'duplicate'])->name('employees.duplicate');
Route::resource('employees', EmployeeController::class);

Route::get('files/{file}/download', [FileController::class, 'download'])->name('files.download');
Route::get('files/{file}/{fileable_type}/{fileable_id}/detach', [FileController::class, 'detach'])->name('files.detach');
Route::get('files/{file}/{fileable_type}/{fileable_id}/replace', [FileController::class, 'replace'])->name('files.replace');
Route::resource('files', FileController::class);

Route::resource('file-categories', FileCategoryController::class);

Route::get('funds/{fund}/duplicate', [FundController::class, 'duplicate'])->name('funds.duplicate');
Route::resource('funds', FundController::class);

Route::get('investments/{investment}/duplicate', [InvestmentController::class, 'duplicate'])->name('investments.duplicate');
Route::resource('investments', InvestmentController::class);

Route::delete('news/{id}/forcedestroy', [NewsController::class, 'force_destroy'])->name('news.forceDestroy');
Route::put('news/{id}/restore', [NewsController::class, 'restore'])->name('news.restore');
Route::resource('news', NewsController::class);

Route::get('notes/{note}/{noteable_type}/{noteable_id}/detach', [NoteController::class, 'detach'])->name('notes.detach');
Route::resource('notes', NoteController::class);

Route::get('partners/{partner}/duplicate', [PartnerController::class, 'duplicate'])->name('partners.duplicate');
Route::resource('partners', PartnerController::class);

Route::resource('permissions', PermissionController::class)->only(['index']);

Route::get('protectives/{protective}/duplicate', [ProtectiveController::class, 'duplicate'])->name('protectives.duplicate');
Route::resource('protectives', ProtectiveController::class);

Route::delete('reply/{id}/forcedestroy', [ReplyController::class, 'force_destroy'])->name('replies.forceDestroy');
Route::put('reply/{id}/restore', [ReplyController::class, 'restore'])->name('replies.restore');
Route::resource('replies', ReplyController::class)->only(['store', 'destroy']);

Route::get('risks/{risk}/duplicate', [RiskController::class, 'duplicate'])->name('risks.duplicate');
Route::resource('risks', RiskController::class);

Route::resource('users', UserController::class);

Route::resource('systems', SystemController::class);