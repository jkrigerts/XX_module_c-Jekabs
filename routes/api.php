<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
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

// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
 
//     return ['token' => $token->plainTextToken];
// });

Route::post("/v1/auth/signup", [UserController::class, "signup"])->middleware("guest");
Route::post("/v1/auth/signout", [UserController::class, "signout"])->middleware('auth:sanctum');
Route::post("/v1/auth/signin", [UserController::class, "signin"])->middleware("guest");


Route::get("/v1/games", [GameController::class, "apiindex"])->middleware('auth:sanctum');
