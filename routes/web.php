<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChangePasswordController;

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


// Route::get('/', [PostController::class, 'index']);
Route::get('/', [PostController::class, 'guestPost']);
Route::resource('/posts','App\Http\Controllers\PostController');
Route::get('posts/create/collectdataform', [PostController::class, 'collectDataForm']);
Route::post('posts/store/collectdata', [PostController::class, 'storeCollectData']);
Route::get('posts/update/updatecollectdataform', [PostController::class, 'updateCollectDataForm']);
Route::put('posts/update/updateconfirm/{id}', [PostController::class, 'updatePost']);
Route::get('/search_posts', [PostController::class, 'search']);
Route::get('importExportView', [PostController::class, 'importExportView'])->name('importExportView');
Route::get('exportExcel', [PostController::class, 'exportExcel'])->name('exportExcel');
Route::post('importExcel', [PostController::class, 'importExcel'])->name('importExcel');
Route::get('/upload', [PostController::class, 'upload']);


Route::resource('/users','App\Http\Controllers\UserController');
Route::get('users/create/collectdataform', [UserController::class, 'collectDataForm']);
Route::post('users/store/collectdata', [UserController::class, 'storeCollectData']);
Route::get('/createuserconfirm', [UserController::class, 'createUserConfirmation']);
Route::get('/updateuserconfirm', [UserController::class, 'updateUserConfirmation']);
Route::get('/userprofile/{id}', [UserController::class, 'userProfile']);
Route::get('users/update/updatecollectdataform', [UserController::class, 'updateCollectDataForm']);
Route::put('users/update/updateconfirm/{id}', [UserController::class, 'updateUser']);
Route::get('/search_users', [UserController::class, 'search']);

Auth::routes();
Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('/change-password', [ChangePasswordController::class,'store'])->name('change.password');










