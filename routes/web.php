<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersPeriodicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashborad');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('admin/dashboard',[AdminController::class, 'index']);
    Route::prefix('medicine')->group(function(){
        Route::get('/',[MedicineController::class,'index'])->name('medicine.index');
        Route::get('/index',[MedicineController::class,'index_customer'])->name('medicine.customer');
        Route::get('/add',[MedicineController::class,'create'])->name('medicine.add');
        Route::get('/edit/{id}',[MedicineController::class,'edit'])->name('medicine.edit');
        Route::get('/show',[MedicineController::class,'show'])->name('medicine.show');
        Route::post('/store',[MedicineController::class,'store'])->name('medicine.store');
        Route::patch('/update',[MedicineController::class,'update'])->name('medicine.update');
        Route::delete('/destroy',[MedicineController::class,'destroy'])->name('medicine.destroy');
    });

    Route::prefix('order')->group(function(){
        Route::get('/add/{id}',[OrdersController::class,'create'])->name('order.create');
        Route::delete('/delete',[OrdersController::class,'destroy'])->name('order.destroy');
        Route::get('/',[OrdersController::class,'index'])->name('order.index');
        Route::post('/periodicOrder',[OrdersPeriodicController::class,'create'])->name('order.periodic');
    });
});

Route::middleware(['auth','role:customer'])->group(function(){
    Route::get('customer/dashboard',[CustomerController::class, 'index']);
});

Route::middleware(['auth','role:company'])->group(function(){
    Route::get('company/dashboard',[CompanyController::class, 'index']);
});
