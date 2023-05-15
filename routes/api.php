<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileCategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\ProductCommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFileController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'show']);
});

Route::get(     'products',                     [ProductController::class, 'index']);
Route::post(    'products',                     [ProductController::class, 'store']);
Route::get(     'products/{product}',           [ProductController::class, 'show']);
Route::put(     'products/{product}',           [ProductController::class, 'update']);
Route::delete(  'products/{product}',           [ProductController::class, 'destroy']);
Route::get(     'products/{product}/comments',  [ProductCommentController::class, 'index']);
Route::post(    'products/{product}/comments',  [ProductCommentController::class, 'store']);
Route::get(     'products/{product}/files',     [ProductFileController::class, 'index']);
Route::post(    'products/{product}/files',     [ProductFileController::class, 'store']);

Route::get('files', [FileController::class, 'index']);
Route::post('files', [FileController::class, 'store']);
Route::get('files/{file}', [FileController::class, 'show']);
Route::put('files/{file}', [FileController::class, 'update']);
Route::delete('files/{file}', [FileController::class, 'destroy']);

Route::get('file-categories', [FileCategoryController::class, 'index']);
Route::post('file-categories', [FileCategoryController::class, 'store']);
Route::get('file-categories/{file_category}', [FileCategoryController::class, 'show']);
Route::put('file-categories/{file_category}', [FileCategoryController::class, 'update']);
Route::delete('file-categories/{file_category}', [FileCategoryController::class, 'destroy']);

Route::get('funds', [FundController::class, 'index']);
Route::post('funds', [FundController::class, 'store']);
Route::get('funds/{fund}', [FundController::class, 'show']);
Route::put('funds/{fund}', [FundController::class, 'update']);
Route::delete('funds/{fund}', [FundController::class, 'destroy']);

Route::get('risks', [RiskController::class, 'index']);
Route::post('risks', [RiskController::class, 'store']);
Route::get('risks/{risk}', [RiskController::class, 'show']);
Route::put('risks/{risk}', [RiskController::class, 'update']);
Route::delete('risks/{risk}', [RiskController::class, 'destroy']);

Route::get('links', [LinkController::class, 'index']);
Route::post('links', [LinkController::class, 'store']);
Route::get('links/{link}', [LinkController::class, 'show']);
Route::put('links/{link}', [LinkController::class, 'update']);
Route::delete('links/{link}', [LinkController::class, 'destroy']);
