<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\OrderController;



Route::get('/furnitures', [FurnitureController::class, 'displayAvailableFurnitures']);
Route::get('/furnitures/{id}', [FurnitureController::class, 'displayFurnitureDetails']);

Route::post('/users',[UserController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/register', [UserController::class, 'register']);
    Route::get('/users', [UserController::class, 'checkUser']);
    
    Route::post('/orders',[OrderController::class, 'createOrder']);
    Route::get('/orders',[OrderController::class, 'getOrders']);
    Route::delete('/orders/{id}', [OrderController::class, 'deleteOrder']);
    Route::put('/orders',[OrderController::class, 'completeOrders']);

    Route::post('/logout', [LogController::class, 'logout']);

    // Route::get('/users', [PostController::class, 'show']);
    // Route::put('/users/{id}', [PostController::class, 'update'])->middleware('restrictRole:customer');
});

Route::post('/login', [LogController::class, 'login']);
//Une route uniquement accessible à un admin
// Une route uniquement accessible à un customer






        


