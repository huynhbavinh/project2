<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiLoginController;
use Laravel\Sanctum\Sanctum;

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
// đăng nhập vào web = api
Route::post('/login',[ApiLoginController::class,'login']);
Route::post('/logout',[ApiLoginController::class,'logout'])->middleware('auth:sanctum');

//
Route::post('/article', function () {
    return 'đăng nhập vào route thành công';
})->middleware('auth:sanctum');