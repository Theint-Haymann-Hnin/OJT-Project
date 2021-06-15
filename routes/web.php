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
Route::get('posts/create/collectdataform', [PostController::class, 'collectDataForm']);
Route::post('posts/store/collectdata', [PostController::class, 'storeCollectData']);
// Route::get('/updateConfirmDataForm', [PostController::class, 'updateConfirmDataForm']);
Route::get('/upload', [PostController::class, 'upload']);


Route::resource('/users','App\Http\Controllers\UserController');
Route::post('/changepassword', [UserController::class, 'changePassword']);
Route::post('/createuserconfirm', [UserController::class, 'createUserConfirmation']);
Route::post('/updateuserconfirm', [UserController::class, 'updateUserConfirmation']);
Route::post('/userprofile', [UserController::class, 'userProfile']);





