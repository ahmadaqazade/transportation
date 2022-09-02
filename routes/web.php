<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CargoController;

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

Route::get('/', function () {
    return view('layouts/master');
});

Route::prefix('admin')->namespace('Admin')->group(function(){

    Route::get('/', [AdminDashboardController::class, 'home'])->name('admin');

    //sender routes
    Route::prefix('sender')->group(function(){
        Route::get('/', [SenderController::class, 'index'])->name('admin.sender.index');
        Route::get('/create', [SenderController::class, 'create'])->name('admin.sender.create');
        Route::post('/store', [SenderController::class, 'store'])->name('admin.sender.store');
        Route::get('/edit/{sender}', [SenderController::class, 'edit'])->name('admin.sender.edit');
        Route::put('/update/{sender}', [SenderController::class, 'update'])->name('admin.sender.update');
        Route::delete('/destroy/{sender}', [SenderController::class, 'destroy'])->name('admin.sender.distroy');
    });

    //driver routes
    Route::prefix('driver')->group(function(){
        Route::get('/', [DriverController::class, 'index'])->name('admin.driver.index');
        Route::get('/create', [DriverController::class, 'create'])->name('admin.driver.create');
        Route::post('/store', [DriverController::class, 'store'])->name('admin.driver.store');
        Route::get('/edit/{driver}', [DriverController::class, 'edit'])->name('admin.driver.edit');
        Route::put('/update/{driver}', [DriverController::class, 'update'])->name('admin.driver.update');
        Route::delete('/destroy/{driver}', [DriverController::class, 'destroy'])->name('admin.driver.distroy');
    });


    //car routes
    Route::prefix('car')->group(function(){
        Route::get('/', [CarController::class, 'index'])->name('admin.car.index');
        Route::get('/create', [CarController::class, 'create'])->name('admin.car.create');
        Route::post('/store', [CarController::class, 'store'])->name('admin.car.store');
        Route::get('/edit/{car}', [CarController::class, 'edit'])->name('admin.car.edit');
        Route::put('/update/{car}', [CarController::class, 'update'])->name('admin.car.update');
        Route::delete('/destroy/{car}', [CarController::class, 'destroy'])->name('admin.car.distroy');
    });


    //car routes
    Route::prefix('cargo')->group(function(){
        Route::get('/', [CargoController::class, 'index'])->name('admin.cargo.index');
        Route::get('/create', [CargoController::class, 'create'])->name('admin.cargo.create');
        Route::post('/store', [CargoController::class, 'store'])->name('admin.cargo.store');
        Route::get('/edit/{cargo}', [CargoController::class, 'edit'])->name('admin.cargo.edit');
        Route::put('/update/{cargo}', [CargoController::class, 'update'])->name('admin.cargo.update');
        Route::delete('/destroy/{cargo}', [CargoController::class, 'destroy'])->name('admin.cargo.distroy');
    });

});

