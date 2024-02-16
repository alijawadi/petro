<?php

use App\AppLayer\Controllers\ClientController;
use App\AppLayer\Controllers\DashboardController;
use App\AppLayer\Controllers\OrderController;
use App\AppLayer\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('/register');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');

    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

});

require __DIR__.'/auth.php';
