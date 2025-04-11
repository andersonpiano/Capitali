<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\DeliveriesEpiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('garages', GarageController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('people', PersonController::class);
    Route::resource('equipments', EquipmentController::class);
    Route::resource('deliveriesepi', DeliveriesEpiController::class);
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/auth.php';
