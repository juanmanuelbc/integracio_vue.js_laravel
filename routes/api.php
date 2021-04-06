<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentariController;
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

Route::get('/hola', function () {
    return 'Hola món!!!';
});

Route::apiResource('post', PostController::class);

Route::apiResource('/post/{post}/comentari', ComentariController::class);