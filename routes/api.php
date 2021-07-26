<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ChangePasswordController;
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
Route::post('login', [LoginController::class, 'apiLogin']);
Route::post('logout', [LoginController::class, 'apiLogout']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('users', UserController::class);
Route::get('users_search', [UserController::class, 'search']);
Route::post('/change_password/{id}', [ChangePasswordController::class,'store']);

Route::apiResource('posts', PostController::class);
Route::get('posts/search', [UserController::class, 'search']);
Route::post('/exportExcel', [PostController::class, 'exportExcel']);
Route::post('/importExcel', [PostController::class, 'importExcel']);


