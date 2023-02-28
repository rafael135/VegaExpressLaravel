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

Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [LoginController::class, "login"]);
Route::get("/register");

Route::get("/product/{id}", [ProductController::class, "getProduct"])->name("product.get");

Route::get("/products", [ProductController::class, "getUserProducts"]);

Route::get("/search", [ProductController::class, "search"])->name("product.search");
