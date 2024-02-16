<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\API\MatchController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get method
Route::get('list',[UserController::class,'list']);

// add method
Route::post('add',[UserController::class,'add']);

// update method
Route::put('update',[UserController::class,'update']);

// search method
Route::get('search/{name}',[UserController::class, 'search']);

// delete method
Route::delete('delete/{id}',[UserController::class, 'delete']);

// save/validation method
Route::post('save',[UserController::class, 'testData']);

//Matching API
Route::post("startmatching", [MatchController::class, "startMatching"]);