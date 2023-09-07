<?php

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

Route::get('/', function () {
    $nfts = DB::table("nfts")->get();

    return view('home', ["nfts" => $nfts]);
});

Route::get("/nft/{id}", function () {
    //return view ('home');
});

Route::get("/login", function () {
    return view("login");
});

Route::post("/login", [UserController::class, 'authenticate']);

Route::get("/logout", [UserController::class, 'logout']);