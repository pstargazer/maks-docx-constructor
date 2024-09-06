<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/", function () {
    return Redirect::to("/clients");
});
Route::get("/home", function () {
    return Redirect::to("/clients");
});

Route::middleware("auth")->group(function () {
    // contracts crud
    Route::group(
        [
            "prefix" => "contracts",
            "namespace" => "\App\Http\Controllers\Contract",
            "as" => "contract.",
        ],
        function () {
            // Route::middleware(['auth'])->group(function () {
            Route::get("/", "IndexController")->name("index");
            // Route::view('/add', 'contract.create');
            Route::get("/add", "CreateController")->name("create");
            Route::post("/add", "GenerateController")->name("store");
            Route::post("/generate", "GenerateController")->name("generate");
        }
    );

    // clients crud
    Route::group(
        [
            "prefix" => "clients",
            "as" => "client.",
            "namespace" => "\App\Http\Controllers\Client",
        ],
        function () {
            Route::get("/", "IndexController")->name("index");
            // Route::get('/', [\App\Http\Controllers\Client\IndexController::class,'__invoke'])->name('index');
            Route::controller("ClientController")->group(function () {
                // Route::get('/','index')->name('client.index');
                // Route::view('/', 'client.index');
                Route::get("/edit/{id}", "edit")->name("edit");
                Route::post("/edit/{id}", "update")->name("update");

                Route::get("/add", "create")->name("create");
                Route::post("/add", "store")->name("store");
            });
        }
    );

    // templates
    Route::group(
        [
            "prefix" => "templates",
            "as" => "template.",
            "namespace" => "\App\Http\Controllers\Template",
        ],
        function () {
            Route::get("/", "IndexController")->name("index");

            // view
            Route::get("/view", "ViewController")->name("view");
            // api
            Route::post("/viewsrc", "GetController")->name("view-src");

            Route::get("/create", "CreateController")->name("create");
            Route::post("/create", "StoreController")->name("store");
        }
    );
});
