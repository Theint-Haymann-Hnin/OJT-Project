<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts','App\Http\Controllers\PostController');
Route::get('/upload', [PostController::class, 'upload']);
Route::get('/createpostconfirm', [PostController::class, 'createPostConfirmation']);
Route::get('/updatepostconfirm', [PostController::class, 'updatePostConfirmation']);




Route::resource('/users','App\Http\Controllers\UserController');
Route::get('/changepassword', [UserController::class, 'changePassword']);
Route::get('/createuserconfirm', [UserController::class, 'createUserConfirmation']);
Route::get('/userprofile', [UserController::class, 'userProfile']);





