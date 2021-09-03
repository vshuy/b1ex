<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DethiController;
use App\Http\Controllers\FbAuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;

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

// --------------------Exam region-------------
Route::get('/uploadfilepage', function () {
    return view('uploadfile');
})->name('uploadfilepage')->middleware('auth');
Route::post('/uploadfile', [UploadController::class, 'uploadFile'])->name('uploadfile')->middleware('auth');
Route::get('/', [PartController::class, 'showListExam'])->name('dashboard')->middleware('auth');
Route::get('/detailanexamby/{id}', [PartController::class, 'detailAnExam']);
Route::get('/createoneexam', [DethiController::class, 'createOneExam'])->name('createOneExam')->middleware('auth');
Route::get('/deleteanexamby/{id}', [PartController::class, 'deleteAnExamById']);

//////////////--------------Identify region-------------/////////////////////
// Route::get('/login', [UserController::class, 'showViewLogin'])->name('loginpage');
// Route::post('/loginrequest', [UserController::class, 'handleLogin'])->name('login');
// Route::get('/logoutrequest', [UserController::class, 'handleLogout'])->name('logout');
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
//////////////////----------Document region------Rest Full API template---//////////////////
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::get('/uploaddocumentpage', [PostController::class, 'create'])->name('uploadpostpage');
Route::get('/postmanage', [PostController::class, 'index'])->name('dashboardpost');
Route::get('/deleteanpostby/{id}', [PostController::class, 'destroy']);
Route::get('/detailanpostby/{id}', [PostController::class, 'show']);
Route::get('/updateanpostby/{id}', [PostController::class, 'edit']);
Route::post('/updatepostrequest', [PostController::class, 'update']);
Route::post('/uploadpost', [PostController::class, 'store'])->name('uploadpost');

// ----------------------------Category region ------ RestFull API template---------------
Route::get('/uploadcategorypage', [CategoryController::class, 'create'])->name('uploadcategorypage');
Route::get('/categorymanage', [CategoryController::class, 'index'])->name('dashboardcategory');
Route::post('/uploadcategory', [CategoryController::class, 'store'])->name('uploadcategory');
Route::get('/deleteancategoryby/{id}', [CategoryController::class, 'destroy']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
