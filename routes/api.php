<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get("/users",[UserController::class,'index']);
// Route::post('/register',[UserController::class,'register']);

// Route::group(['middleware'=>['auth:sanctum']],function () { 
//     Route::post("/users",[UserController::class,'store']);
// });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::group(['middleware'=>['handleUserRequest']],function(){
//     Route::post('/register','UserController@register');
// });

Route::post('/register',[UserController::class, 'register'])->middleware('handleUserRequest');