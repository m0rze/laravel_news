<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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

Route::get("/", [HelloController::class, "sayHello"])
    ->name("hello");

Route::group(["prefix" => "cat"], function () {
    Route::get("/", [CategoryController::class, "showCatsList"])
        ->name("catslist");

    Route::get("/{id}", [CategoryController::class, "showCategory"])
        ->name("showcat");
});

Route::group(["prefix" => "news"], function () {
    Route::get("/", [NewsController::class, "getNewsList"])
        ->name("newslist");
    Route::get("/cat/{catId}", [NewsController::class, "getNewsList"])
        ->name("newslistbycat");
    Route::get("/{newsId}", [NewsController::class, "showNews"])
        ->name("onenews");
});

Route::group(["prefix" => "user"], function () {
    Route::get("/login", [AuthController::class, "showLoginForm"])
        ->name("login");
});

Route::group(["prefix" => "admin", 'as' => 'admin.'], function () {
    Route::get("/", [AdminDashboardController::class, "show"])
        ->name("dashboard");
    Route::resource("/news", AdminNewsController::class);
    Route::resource("/categories", AdminCategoriesController::class);
});

