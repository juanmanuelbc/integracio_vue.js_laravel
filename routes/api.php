<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentariController;
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

Route::get('/hola', function () {
    return 'Hola món!!!';
});

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{post}', [PostController::class, 'show']);

Route::get('/post/{post}/comentari', [ComentariController::class, 'index']);
Route::get('/post/{post}/comentari/{comentari}', [ComentariController::class, 'show']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/protected-hola', function () {
        return 'Hola món protegit!!!';
    });

    Route::post('/post', [PostController::class, 'store']);
    Route::put('/post/{post}', [PostController::class, 'update']);
    Route::delete('/post/{post}', [PostController::class, 'destroy']);

    Route::post('/post/{post}/comentari', [ComentariController::class, 'store']);
    Route::put('/post/{post}/comentari/{comentari}', [ComentariController::class, 'update']);
    Route::delete('/post/{post}/comentari/{comentari}', [ComentariController::class, 'destroy']);
});