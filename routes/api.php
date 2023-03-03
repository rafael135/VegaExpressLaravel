<?php

use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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



Route::post("/user/register", [LoginController::class, "register"])->name("api.register");
Route::post("/user/login", [LoginController::class, "login"])->name("api.login");
//Route::get("/user/logout", [LoginController::class, "logout"])->name("api.logout");


//Route::post("/users/add", [UserController::class, "insert"]);

Route::post("/products/add", [ProductController::class, "insert"]);

Route::post("/evaluations/products/add", [EvaluationController::class, "insert"]);
