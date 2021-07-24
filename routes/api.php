<?php

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

// facebook auth api gate way
Route::get('/checkfbuserid', [FbAuthController::class, 'handleRequest']);
Route::post('/updatescore', [FbAuthController::class, 'updateScore']);
Route::post('/deleteaccountbyuserid', [FbAuthController::class, 'deleteUserbyId']);
