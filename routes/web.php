<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [HomeController::class, "index"])->name("home");

Route::get("/login", [LoginController::class, "showLogin"])->name("auth.showLogin");
Route::get("/register", [LoginController::class, "showRegister"])->name("auth.showRegister");

Route::post("/user/register", [LoginController::class, "register"])->name("auth.register");
Route::post("/user/login", [LoginController::class, "login"])->name("auth.login");
Route::get('/user/logout', [LoginController::class, "logout"])->name("auth.logout");

Route::get("/product/{id}", [ProductController::class, "getProduct"])->name("product.get");

Route::get("/products", [ProductController::class, "getUserProducts"]);

Route::get("/search", [ProductController::class, "search"])->name("product.search");
