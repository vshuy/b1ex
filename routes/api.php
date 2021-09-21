<?php

use App\Http\Controllers\ApiLythuyetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\DethiController;
use App\Http\Controllers\FbAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/getlistde', [DethiController::class, 'getListDe']);

Route::get('/getpart1/{id}', [PartController::class, 'getPart1ById']);
Route::get('/getpart2/{id}', [PartController::class, 'getPart2ById']);
Route::get('/getpart3.1/{id}', [PartController::class, 'getPart3dot1ById']);
Route::get('/getpart3.2/{id}', [PartController::class, 'getPart3dot2ById']);
Route::get('/getpart4/{id}', [PartController::class, 'getPart4ById']);
Route::get('/getpart5/{id}', [PartController::class, 'getPart5ById']);
Route::get('/getpart6/{id}', [PartController::class, 'getPart6ById']);
Route::get('/getpart7/{id}', [PartController::class, 'getPart7ById']);
Route::get('/getpart8/{id}', [PartController::class, 'getPart8ById']);
Route::get('/getpart9/{id}', [PartController::class, 'getPart9ById']);
Route::get('/getpart10/{id}', [PartController::class, 'getPart10ById']);
Route::get('/getpart11/{id}', [PartController::class, 'getPart11ById']);
Route::get('/getpart12/{id}', [PartController::class, 'getPart12ById']);
Route::get('/getpart13/{id}', [PartController::class, 'getPart13ById']);

Route::get('/getoneexam/{id}', [PartController::class, 'getOneExamById']);

// facebook auth api gate way
Route::get('/checkfbuserid', [FbAuthController::class, 'handleRequest']);
Route::post('/updatescore', [FbAuthController::class, 'updateScore']);
Route::post('/deleteaccountbyuserid', [FbAuthController::class, 'deleteUserbyId']);

Route::get('/createoneexam', [DethiController::class, 'createOneExam']);

Route::get('/getlistlythuyet', [ApiLythuyetController::class, 'index']);
Route::get('/getdetaillythuyetby/{id}', [ApiLythuyetController::class, 'show']);
