<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PartController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DethiController;
use App\Http\Controllers\FbAuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DethiGocController;

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

Route::get('/test', function () {
    return "good i'm already ok";
});

Route::middleware(['auth'])->group(function () {
    /////////////////------------Upload resource region ------- Rest Full API template ---------------------------
    Route::get('/uploadfilepage', [UploadController::class, 'create'])->name('uploadfilepage');
    Route::post('/uploadfile', [UploadController::class, 'store'])->name('uploadfile');

    /////////////////------------Root Exam region ---------- Rest Full API template ---------------------------
    Route::get('/dashboardrootexam', [DethiGocController::class, 'index'])->name('dashboardrootexam');
    Route::get('/detailanrootexamby/{id}', [DethiGocController::class, 'show']);
    Route::get('/deleteanrootexamby/{id}', [DethiGocController::class, 'destroy']);

    /////////////////------------Exam region ---------- Rest Full API template ---------------------------
    Route::get('/dashboardexam', [ExamController::class, 'index'])->name('dashboard');
    Route::post('/createoneexam', [ExamController::class, 'store'])->name('createOneExam');
    Route::get('/deleteanexamby/{id}', [ExamController::class, 'destroy']);

    //////////////////----------Document region------Rest Full API template---//////////////////
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
    Route::get('/uploaddocumentpage', [PostController::class, 'create'])->name('uploadpostpage');
    Route::get('/postmanage', [PostController::class, 'index'])->name('dashboardpost');
    Route::get('/postmanagebyidcategory/{id}', [PostController::class, 'listDocByIdCategory'])->name('dashboardpostbyidcategory');
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

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::get('/detailanexamby/{id}', [ExamController::class, 'show']);

// Auth::routes();
Auth::routes(['verify' => true]);
Route::get('profile', function () {
    return "congrat your account has verified";
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');

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
