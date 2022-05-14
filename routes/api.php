<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'todos'], function (){
    Route::get('', [\App\Http\Controllers\Api\V1\TodoController::class, 'index'])->name('todo.index');
    Route::post('', [\App\Http\Controllers\Api\V1\TodoController::class, 'store'])->name('todo.create');
    Route::put('{id}', [\App\Http\Controllers\Api\V1\TodoController::class, 'update'])->name('todo.update');
    Route::delete('{id}', [\App\Http\Controllers\Api\V1\TodoController::class, 'destroy'])->name('todo.delete');
});
