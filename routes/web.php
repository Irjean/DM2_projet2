<?php

use App\Http\Controllers\NftController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [NftController::class, "getAll"]);

Route::get("/nft/{id}", [NftController::class, "getOne"]);

Route::get("/nft/{id}/buy", [NftController::class, "buyNft"]);

Route::get("/login", function () {
    return view("login", ["cssLink" => "css/auth.css"]);
});

Route::post("/login", [UserController::class, 'authenticate']);

Route::get("/logout", [UserController::class, 'logout']);

Route::get("register", function () {
    return view("register", ["cssLink" => 'css/auth.css']);
});

Route::post("register", [UserController::class, "register"]);
