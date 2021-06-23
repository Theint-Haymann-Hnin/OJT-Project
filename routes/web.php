<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index']);

Route::resource('/posts','App\Http\Controllers\PostController')->middleware('isadmin');
Route::get('posts/create/collectdataform', [PostController::class, 'collectDataForm']);
Route::post('posts/store/collectdata', [PostController::class, 'storeCollectData']);


// update confirm
Route::get('posts/update/updatecollectdataform', [PostController::class, 'updateCollectDataForm']);
Route::put('posts/update/updateconfirm/{id}', [PostController::class, 'updateConfirm']);
//  update confirm
Route::get('/search_posts', [PostController::class, 'search']);


// Route for view/blade file.
Route::get('importExportView', [PostController::class, 'importExportView'])->name('importExportView');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [PostController::class, 'exportExcel'])->name('exportExcel');
// Route for import excel data to database.
Route::post('importExcel', [PostController::class, 'importExcel'])->name('importExcel');
Route::get('/upload', [PostController::class, 'upload']);



Route::resource('/users','App\Http\Controllers\UserController');
Route::get('users/create/collectdataform', [UserController::class, 'collectDataForm']);
Route::post('users/store/collectdata', [UserController::class, 'storeCollectData']);
Route::get('/createuserconfirm', [UserController::class, 'createUserConfirmation']);
Route::get('/updateuserconfirm', [UserController::class, 'updateUserConfirmation']);
Route::get('/userprofile/{id}', [UserController::class, 'userProfile']);
// update confirm
Route::get('users/update/updatecollectdataform', [UserController::class, 'updateCollectDataForm']);
Route::put('users/update/updateconfirm/{id}', [UserController::class, 'updateConfirm']);
//  update confirm
Route::get('/search_users', [UserController::class, 'search']);

Auth::routes();

// Change Password
Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('/change-password', [ChangePasswordController::class,'store'])->name('change.password');
// Change Password






