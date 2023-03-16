<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneAuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
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
Route::get('phone-otp', [PhoneAuthController::class, 'index']);
Route::get('images-upload', [ImageController::class, 'index']);
Route::post('uploadImage', [ImageController::class, 'uploadImage']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('projects', [ProjectController::class, 'index']);