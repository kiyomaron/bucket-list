<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TaskController;
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
Route::apiResource('tasks', 'TaskController');

/* Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks/{$task}', [TaskController::class, 'store']);
Route::put('tasks/{$task}', [TaskController::class, 'update']);
Route::post('tasks/{$task}', [TaskController::class, 'update']); */


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
