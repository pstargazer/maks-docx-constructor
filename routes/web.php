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

// Route::post(
//     "/contracts/add",
//     "\App\Http\Controllers\Contract\GenerateController"
// );
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
});

Route::view("/import", "import")->name("import");
// Route::post("/import", function () {
//     Artisan::call("app:data:import");
// });

Route::get("/others", function () {
    return view("others.others");
});

// Route::view('/indextest', 'layouts.);
