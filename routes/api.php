<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::post('comments', [CommentController::class, 'store']);
    Route::put('comments/{comment}', [CommentController::class, 'update']);
    Route::delete('comments/{comment}', [CommentController::class,'destroy']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('userprofile',[AuthController::class,'userprofile']);
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('userResource',[AuthController::class,'userResource']);
    Route::get('userResourceCollection',[AuthController::class,'userResourceCollection']);
    Route::get('userCollection',[AuthController::class,'userCollection']);
}
);
