<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/XX_module_c/admin", [AdminSessionController::class, "create"])->name("login")->middleware("guest:admin");
Route::post("/XX_module_c/admin", [AdminSessionController::class, "store"])->middleware("guest:admin");
Route::post("/XX_module_c/admin/logout", [AdminSessionController::class, "destroy"])->middleware("auth:admin");;


Route::get("/XX_module_c/admin/admins", [AdminController::class, "admins"])->middleware("auth:admin");

Route::get("/XX_module_c/user", [UserController::class, "index"])->middleware("auth:admin");
Route::post("/XX_module_c/user", [UserController::class, "update"])->middleware("auth:admin");
Route::get("/XX_module_c/user/{user:username}", [UserController::class, "show"]);


Route::get("/XX_module_c/game", [GameController::class, "index"])->middleware("auth:admin");
Route::get("/XX_module_c/game/{game:slug}", [GameController::class, "show"])->middleware("auth:admin");
Route::post("/XX_module_c/gamea", [GameController::class, "update"])->middleware("auth:admin");
