<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index']);

// Route::resource('posts', 'App\Http\Controllers\PostController', [
//     'except' => [
//         'index'
//     ]
// ])
// ->middleware(['isadmin']);

Route::resource('/posts','App\Http\Controllers\PostController')->middleware('isadmin');
Route::get('posts/create/collectdataform', [PostController::class, 'collectDataForm']);
Route::post('posts/store/collectdata', [PostController::class, 'storeCollectData']);


// example
Route::get('posts/update/updatecollectdataform', [PostController::class, 'updateCollectDataForm']);
Route::put('posts/update/updateconfirm/{id}', [PostController::class, 'updateConfirm']);

// example


Route::get('/upload', [PostController::class, 'upload']);





Route::resource('/users','App\Http\Controllers\UserController');
Route::get('users/create/collectdataform', [UserController::class, 'collectDataForm']);
Route::post('users/store/collectdata', [UserController::class, 'storeCollectData']);
Route::get('/changepassword', [UserController::class, 'changePassword']);
Route::get('/createuserconfirm', [UserController::class, 'createUserConfirmation']);
Route::get('/updateuserconfirm', [UserController::class, 'updateUserConfirmation']);
Route::get('/userprofile/{id}', [UserController::class, 'userProfile']);

Auth::routes();





