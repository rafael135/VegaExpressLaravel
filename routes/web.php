<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Mails\RegisterEmailController;
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
Route::post("/user/email/confirm", [RegisterEmailController::class, "send"])->name("user.email.confirm.send");
Route::get("/user/email/check", [RegisterEmailController::class, "check"])->name("user.email.confirm.check");

//Route::post("/user/register", [LoginController::class, "register"])->name("api.register");
//Route::post("/user/login", [LoginController::class, "login"])->name("api.login");
Route::get("/logout", [LoginController::class, "logout"])->name("api.logout");

Route::get("/product/{id}", [ProductController::class, "getProduct"])->name("product.get");
Route::get("/products", [ProductController::class, "getUserProducts"]);

Route::get("/user/product/create", [ProductController::class, "showCreateProduct"])->name("user.product.create");
Route::get("/user/config", [UserController::class, "showconfig"])->name("user.config");
Route::get("/user/profile/{id?}", [UserController::class, "showProfile"])->name("user.profile");
Route::get("/user/products", [UserController::class, "showUserProducts"])->name("user.products");


Route::get("/user/addresses/delete/{id}", [AddressController::class, "delete"])->name("user.address.delete");
Route::get("/user/addresses/edit/{id}", [AddressController::class, "edit"])->name("user.address.edit");
Route::post("/user/address/update-status", [AddressController::class, "updateStatus"])->name("user.address.updateStatus");

Route::get("/search", [ProductController::class, "search"])->name("product.search");
