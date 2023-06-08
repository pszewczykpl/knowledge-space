<?php

use App\Http\Controllers\API\FileCategoryController;
use App\Http\Controllers\API\FileController;
use App\Http\Controllers\API\FundController;
use App\Http\Controllers\API\LinkController;
use App\Http\Controllers\API\ProductCommentController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductFileController;
use App\Http\Controllers\API\RiskController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Symfony\Component\HttpFoundation\Response;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [\App\Http\Controllers\API\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/login', [\App\Http\Controllers\API\Auth\LoginController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [\App\Http\Controllers\API\Auth\LogoutController::class, 'logout'])->name('logout');
    Route::get('/profile', [\App\Http\Controllers\API\UserController::class, 'show']);
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

Route::apiResource('articles', \App\Http\Controllers\API\ArticleController::class);
Route::apiResource('comments', \App\Http\Controllers\API\CommentController::class);

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

//    return $status === Password::RESET_LINK_SENT
//        ? response()->json(['message' => 'E-mail succesfully sended.'])
//        : response()->json(['message' => 'Error.']);
    // Return json response if password::reset_link_sent, else return error message
    return $status === Password::RESET_LINK_SENT
        ? response()->json(['message' => 'E-mail succesfully sended.'], Response::HTTP_OK)
        : response()->json(['message' => Password::RESET_THROTTLED ? 'Too many request' : 'Error'], Response::HTTP_BAD_REQUEST);
})->name('password.email');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? response()->json(['message' => 'E-mail succesfully sended.'], Response::HTTP_OK)
        : response()->json(['message' => 'Error'], Response::HTTP_BAD_REQUEST);
})->name('password.update');
