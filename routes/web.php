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
use App\Http\Controllers\BancassuranceController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

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

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

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

Route::delete('bancassurances/{bancassurance}/forcedestroy', [BancassuranceController::class, 'force_destroy'])->name('bancassurances.forceDestroy');
Route::put('bancassurances/{bancassurance}/restore', [BancassuranceController::class, 'restore'])->name('bancassurances.restore');
Route::get('bancassurances/{bancassurance}/duplicate', [BancassuranceController::class, 'duplicate'])->name('bancassurances.duplicate');
Route::resource('bancassurances', BancassuranceController::class);

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

Route::delete('post-categories/{id}/forcedestroy', [PostCategoryController::class, 'force_destroy'])->name('post-categories.forceDestroy');
Route::put('post-categories/{id}/restore', [PostCategoryController::class, 'restore'])->name('post-categories.restore');
Route::resource('post-categories', PostCategoryController::class);

Route::delete('posts/{id}/forcedestroy', [PostController::class, 'force_destroy'])->name('posts.forceDestroy');
Route::put('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::resource('posts', PostController::class);

Route::resource('attachments', AttachmentController::class);

Route::get('search/{scope}', [SearchController::class, 'search'])->name('search');

Route::get('system-properties', [\App\Http\Controllers\SystemPropertyController::class, 'index'])->name('system-properties.index');
Route::put('system-properties', [\App\Http\Controllers\SystemPropertyController::class, 'update'])->name('system-properties.update');
Route::get('system-properties/update-app', [\App\Http\Controllers\SystemPropertyController::class, 'getNewAppVersionFromGit'])->name('system-properties.getNewAppVersionFromGit');
Route::get('system-properties/maintenance/off', [\App\Http\Controllers\SystemPropertyController::class, 'maintenance_off'])->name('system-properties.maintenanceOff');
Route::get('system-properties/maintenance/on', [\App\Http\Controllers\SystemPropertyController::class, 'maintenance_on'])->name('system-properties.maintenanceOn');

Route::get('system-configuration/dark-mode', [\App\Http\Controllers\SystemConfigurationController::class, 'switchDarkMode'])->name('system-configuration.dark-mode');