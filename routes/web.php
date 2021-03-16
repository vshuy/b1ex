<?php

use App\Http\Controllers\DethiController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('uploadfile');
})->name('uploadfilepage')->middleware('auth');

Route::post('/uploadfile', [UploadController::class, 'uploadFile'])->name('uploadfile')->middleware('auth');

Route::get('/model', function () {
    echo "test model<br>";
});

Route::get('/getlistde', [DethiController::class, 'getListDe']);
Route::get('/getrandomidde', [PartController::class, 'getRandomIdDe']);
Route::get('/getoneexam', [PartController::class, 'getRandomAnExam']);
Route::get('/getpart1', [PartController::class, 'getPart1']);
Route::get('/getpart2', [PartController::class, 'getPart2']);
Route::get('/getpart3.1', [PartController::class, 'getPart3dot1']);
Route::get('/getpart3.2', [PartController::class, 'getPart3dot2']);
Route::get('/getpart4', [PartController::class, 'getPart4']);
Route::get('/getpart5', [PartController::class, 'getPart5']);
Route::get('/getpart6', [PartController::class, 'getPart6']);
Route::get('/getpart7', [PartController::class, 'getPart7']);
Route::get('/getpart8', [PartController::class, 'getPart8']);
Route::get('/getpart9', [PartController::class, 'getPart9']);
Route::get('/getpart10', [PartController::class, 'getPart10']);
Route::get('/getpart11', [PartController::class, 'getPart11']);
Route::get('/getpart12', [PartController::class, 'getPart12']);
Route::get('/getpart13', [PartController::class, 'getPart13']);
Route::get('/login', function () {
    return view('login');
})->name('loginpage');
Route::post('/loginrequest', [UserController::class, 'handleLogin'])->name('login');
Route::get('/logoutrequest', [UserController::class, 'handleLogout'])->name('logout');

