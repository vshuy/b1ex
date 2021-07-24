<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DethiController;
use App\Http\Controllers\FbAuthController;
use App\Http\Controllers\UploadController;

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


Route::get('/uploadfilepage', function () {
    return view('uploadfile');
})->name('uploadfilepage')->middleware('auth');

Route::post('/uploadfile', [UploadController::class, 'uploadFile'])->name('uploadfile')->middleware('auth');
Route::get('/', [PartController::class, 'showListExam'])->name('dashboard')->middleware('auth');
Route::get('/detailanexamby/{id}', [PartController::class, 'detailAnExam']);
Route::get('/deleteanexamby/{id}', [PartController::class, 'deleteAnExamById']);


Route::get('/login', [UserController::class, 'showViewLogin'])->name('loginpage');
Route::post('/loginrequest', [UserController::class, 'handleLogin'])->name('login');
Route::get('/logoutrequest', [UserController::class, 'handleLogout'])->name('logout');

Route::get('/loginfacebook', function () {
    return view('loginfacebook');
});
Route::get('/resultloginfacebook', function () {
    return view('loginfbsuccess');
});
Route::get('/redirectloginfacebook', function () {
    return view('redirect');
});
Route::get('/policy', function () {
    return view('policy');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/deletedata', function () {
    return view('deletedata');
});
