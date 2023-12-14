<?php

use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Branch\DeviceController;
use App\Http\Controllers\Branch\MalfunctionController;
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
Route::get("login" , [LoginController::class , "index"])->name("login");
Route::post("authenticate" , [LoginController::class , "authenticate"])->name("authenticate");
Route::group(["middleware" => "auth"] , function (){
    Route::group(["middleware" => "admin"] , function (){
        Route::get("/" , [HomeController::class , "index"])->name("home");
        Route::get('add-user' , [HomeController::class , "register"])->name("register");
        Route::post("store" , [HomeController::class , "store"])->name("store-user");
        Route::get("devices-report" , [DeviceController::class , "all"])->name("devices-report");
        Route::get("malfunctions-report" , [MalfunctionController::class , "all"])->name("malfunctions-report");
        Route::get("add-branch" , [BranchController::class , "addBranch"])->name("add-branch");
        Route::post("store-branch" , [BranchController::class , "store"])->name("store-branch");
    });

    Route::get("/logout" , [LoginController::class , "logout"])->name("logout");
    Route::get("/branch" , [BranchController::class , "index"])->name("branch");
    Route::post("/branch-car-datatable" , [BranchController::class , "BranchCarsDataTable"])->name("branch-car-datatable");
    Route::get('add-device' , [DeviceController::class , "index"])->name("add-device");
    Route::post('store-device' , [DeviceController::class , "store"])->name("store-device");
    Route::get('malfunctions' , [MalfunctionController::class , "index"])->name("malfunctions");
    Route::get('show-malfunctions' , [MalfunctionController::class , "showMalfunction"])->name("show-malfunction");
    Route::get('add-malfunction' , [MalfunctionController::class , "addMalfunction"])->name("add-malfunction");
    Route::post('store-malfunction' , [MalfunctionController::class , "store"])->name("store-malfunction");
    Route::get('delete-malfunction/{id}' , [MalfunctionController::class , "delete"])->name("delete-malfunction");
    Route::get('delete-device/{id}' , [DeviceController::class , "delete"])->name("delete-device");

});

