<?php

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

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::group(
    [
        "prefix" => "clients",
        "namespace" => "\App\Http\Controllers\Client\Api",
        "as" => "client.api.",
    ],
    function () {
        Route::get("/all", "IndexController")->name("index");
        Route::get("/search={search}", "SearchController")->name("search");
    }
);

Route::group(
    [
        "prefix" => "templates",
        "namespace" => "\App\Http\Controllers\Template\Api",
        "as" => "template.api.",
    ],
    function () {
        Route::get("/all", "IndexController")->name("index");
        Route::get("/search={search}", "SearchController")->name("search");
    }
);
