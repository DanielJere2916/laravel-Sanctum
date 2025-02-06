<?php
// version one of the API
use App\Http\Controllers\API\V1\LoginController;
use App\Http\Controllers\API\V1\LogoutController;
use App\Http\Controllers\API\V1\RegisterController;
use App\Http\Controllers\API\V1\TaskController;

// version two of the API
use App\Http\Controllers\API\V2\LoginController as LoginControllerV2;
use App\Http\Controllers\API\V2\LogoutController as LogoutControllerV2;
use App\Http\Controllers\API\V2\RegisterController as RegisterControllerV2;
use App\Http\Controllers\API\V2\TaskController as TaskControllerV2;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('tasks', TaskController::class)->middleware('auth:sanctum');
    Route::post('logout', LogoutController::class)->name('logout')->middleware('auth:sanctum');
    Route::post('register', RegisterController::class)->name('register');
    Route::post('login', LoginController::class)->name('login');
});
Route::prefix('v2')->group(function () {
    Route::apiResource('tasks', TaskControllerV2::class)->middleware('auth:sanctum');
    Route::post('logout', LogoutControllerV2::class)->name('logout')->middleware('auth:sanctum');
    Route::post('register', RegisterControllerV2::class)->name('register');
    Route::post('login', LoginControllerV2::class)->name('login');
});
