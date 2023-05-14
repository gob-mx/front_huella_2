<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SampleDataController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DpfpApi\UserRestApiController;
use App\Http\Controllers\DpfpApi\SseController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Sample API route
Route::get('/profits', [SampleDataController::class, 'profits'])->name('profits');

Route::post('/register', [RegisteredUserController::class, 'apiStore']);

Route::post('/login', [AuthenticatedSessionController::class, 'apiStore']);

Route::post('/forgot_password', [PasswordResetLinkController::class, 'apiStore']);

Route::post('/verify_token', [AuthenticatedSessionController::class, 'apiVerifyToken']);

Route::get('/users', [SampleDataController::class, 'getUsers']);

//SensorRestApi
Route::get("/sse/{token_pc}", [SseController::class, "stream"]);
Route::get("/ssejs/{token_pc}", [SseController::class, "streamjs"]);
Route::post("sensor_close", [SseController::class, "update"])->name("sensor_close");

//UserRestApi
Route::post("list_finger", [UserRestApiController::class, "index"]);
Route::post("save_finger", [UserRestApiController::class, "store"]);
Route::post("update_finger", [UserRestApiController::class, "update"]);
Route::post("sincronizar", [UserRestApiController::class, "sincronizar"]);