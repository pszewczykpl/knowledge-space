<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\VerificationController;
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
use App\Http\Controllers\BancassuranceController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\SystemConfigurationController;
use App\Http\Controllers\SystemPropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;

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

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Home.
 */
Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

/**
 * Authentication
 */
require __DIR__.'/auth.php';

/**
 * User authentication modules.
 */
Route::resources([
    'departments' => DepartmentController::class,
    'users' => UserController::class,
]);
Route::resource(
    'permissions', PermissionController::class
)->only(['index']);

/**
 * Products modules.
 */
Route::get('investments/{investment}/duplicate', [InvestmentController::class, 'duplicate'])->name('investments.duplicate');
Route::get('employees/{employee}/duplicate', [EmployeeController::class, 'duplicate'])->name('employees.duplicate');
Route::get('protectives/{protective}/duplicate', [ProtectiveController::class, 'duplicate'])->name('protectives.duplicate');
Route::get('bancassurances/{bancassurance}/duplicate', [BancassuranceController::class, 'duplicate'])->name('bancassurances.duplicate');

Route::resources([
    'employees' => EmployeeController::class,
    'investments' => InvestmentController::class,
    'protectives' => ProtectiveController::class,
    'bancassurances' => BancassuranceController::class,
]);

/**
 * Files and file categories modules.
 */
Route::get('files/{file}/download', [FileController::class, 'download'])->name('files.download');
Route::get('files/{file}/{fileable_type}/{fileable_id}/detach', [FileController::class, 'detach'])->name('files.detach');
Route::get('files/{file}/{fileable_type}/{fileable_id}/replace', [FileController::class, 'replace'])->name('files.replace');

Route::resources([
    'files' => FileController::class,
    'file-categories' => FileCategoryController::class,
]);

/**
 * News, replies, notes and posts modules.
 */
Route::get('notes/{note}/{noteable_type}/{noteable_id}/detach', [NoteController::class, 'detach'])->name('notes.detach');

Route::resources([
    'news' => NewsController::class,
    'notes' => NoteController::class,
    'posts' => PostController::class,
    'post-categories' => PostCategoryController::class,
]);
Route::resource(
    'replies', ReplyController::class
)->only(['store', 'destroy']);

/**
 * Dictionaries modules.
 */
Route::resources([
    'funds' => FundController::class,
    'partners' => PartnerController::class,
    'risks' => RiskController::class,
    'systems' => SystemController::class,
]);

/**
 * Search module.
 */
Route::get('search/{scope}', [SearchController::class, 'search'])->name('search');

/**
 * System properties and configuration module.
 */
Route::get('system-properties', [SystemPropertyController::class, 'index'])->name('system-properties.index');
Route::put('system-properties', [SystemPropertyController::class, 'update'])->name('system-properties.update');
Route::get('system-properties/maintenance/off', [SystemPropertyController::class, 'maintenance_off'])->name('system-properties.maintenanceOff');
Route::get('system-properties/maintenance/on', [SystemPropertyController::class, 'maintenance_on'])->name('system-properties.maintenanceOn');
Route::get('system-properties/dark-mode', [SystemPropertyController::class, 'switchDarkMode'])->name('system-properties.dark-mode');
