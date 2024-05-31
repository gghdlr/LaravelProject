<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

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
//Comment

Route::controller(CommentController::Class)->group(function(){
    Route::post('comment', [CommentController::class, 'store']);
    Route::get('comment/{comment}/edit', [CommentController::class, 'edit']);
    Route::put('comment/{comment}', [CommentController::class, 'update']);
    Route::delete('comment/{comment}', [CommentController::class, 'destroy']);
    Route::get('comment', [Commentcontroller::class, 'index']);
    Route::get('comment/{comment}/reject', 'reject');
    Route::get('comment/{comment}/accept', 'accept');
    Route::get('comment', 'index')->name('comment.index');
});

//Article

Route::resource('article', ArticleController::class)->middleware('auth:sanctum');

//Auth
Route::get('signin', [AuthController::class, 'signin']);
Route::post('registr', [AuthController::class, 'registr']);
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('signup', [AuthController::class, 'signup']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
