<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NftController;
use App\Http\Controllers\UserController;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

Route::get('/', [NftController::class, "getAll"])->name("home");

Route::get("/nft/{id}", [NftController::class, "getOne"]);

Route::get("/nft/{id}/buy", [NftController::class, "buyNft"])->middleware('auth');
Route::get("/nft/{id}/sell", [NftController::class, "sellNft"])->middleware('auth');

Route::get("/collection", [NftController::class, "getUserNft"])->middleware('auth');

Route::get("/login", function () {
    return view("login", ["cssLink" => "css/auth.css"]);
});

Route::post("/login", [UserController::class, 'authenticate']);

Route::get("/logout", [UserController::class, 'logout']);

Route::get("register", function () {
    return view("register", ["cssLink" => 'css/auth.css']);
});

Route::post("register", [UserController::class, "register"]);

Route::get("/admin", [AdminController::class, "home"])->middleware("auth");
Route::get("/admin/nfts", [AdminController::class, "nftList"])->middleware("auth");
Route::get("/admin/nfts/delete/{id}", [AdminController::class, "deleteNft"])->middleware("auth");
Route::get("/admin/add-nft", [AdminController::class, "addNftPage"])->middleware("auth");
Route::post("/admin/add-nft", [AdminController::class, "addNft"])->middleware("auth");

Route::get("/test", function (){
    return view("test");
});

Route::post("/test", function (Request $request){
    csrf_token();
    $file = $request->file("image");
    $file->move("/public", $file->getClientOriginalName());
    return back();
});
