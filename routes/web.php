<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

//Route::post("/user/register", [LoginController::class, "register"])->name("api.register");
//Route::post("/user/login", [LoginController::class, "login"])->name("api.login");
Route::get("/logout", [LoginController::class, "logout"])->name("api.logout");

Route::get("/product/{id}", [ProductController::class, "getProduct"])->name("product.get");
Route::get("/products", [ProductController::class, "getUserProducts"]);

Route::get("/user/config", [UserController::class, "showconfig"])->name("user.config");
Route::get("/user/profile", [UserController::class, "showProfile"])->name("user.profile");
Route::get("/user/products", [UserController::class, "showUserProducts"])->name("user.products");
Route::get("/user/product/create", [ProductController::class, "showCreateProduct"])->name("user.create.product");

Route::get("/search", [ProductController::class, "search"])->name("product.search");
