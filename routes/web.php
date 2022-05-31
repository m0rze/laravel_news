<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Pages\OrderController;
use \App\Http\Controllers\Pages\FeedbackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\IndexController;
use App\Http\Controllers\Pages\NewsController;
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

Route::get("/", IndexController::class)
    ->name("index");

Route::group(["prefix" => "feedback"], function () {
    Route::get("/", [FeedbackController::class, 'show'])
        ->name("feedback");
    Route::post("/send", [FeedbackController::class, 'store'])
    ->name("sendfeedback");
});

Route::group(["prefix" => "order"], function () {
    Route::get("/", [OrderController::class, 'show'])
        ->name("order");
    Route::post("/store", [OrderController::class, 'store'])
        ->name("storeorder");
});

Route::group(["prefix" => "cat"], function () {
    Route::get("/", [CategoryController::class, "showCatsList"])
        ->name("catslist");

    Route::get("/{id}", [CategoryController::class, "showCategory"])
        ->name("showcat");
});

Route::group(["prefix" => "news"], function () {
    Route::get("/cat/{catId}", [NewsController::class, "getNewsListByCat"])
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

