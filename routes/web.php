<?php

use App\Http\Controllers\DethiController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\UploadController;
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
//Route::get('/',[readsheet::class,'HandlerSheet']);

Route::get('/', function () {
    return view('uploadfile');
});

Route::post('/uploadfile', [UploadController::class, 'uploadFile'])->name('uploadfile');

Route::get('/model', function () {
    echo "test model<br>";
});

Route::get('/getlistde', [DethiController::class, 'getListDe']);
Route::get('/getrandomidde', [PartController::class, 'getRandomIdDe']);
Route::get('/getoneexam', [PartController::class, 'getRandomAnExam']);
