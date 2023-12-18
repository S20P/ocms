<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Admin\DenominationsController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('admin.login');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

	Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.change-password');
    Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('admin.update-password');

  //Denominations
	 Route::group(['prefix' => 'denomination'], function () {
			   Route::get('/', [DenominationsController::class,'index'])->name('admin.denomination.index');
			   Route::get('/delete/{id}', [DenominationsController::class,'destroy'])->name('admin.denomination.delete');
	   });
   //@end::Denominations

     //coupon
      Route::group(['prefix' => 'coupon'], function () {
		Route::get('/', [CouponsController::class,'index'])->name('admin.coupon.index');
		Route::get('/create', [CouponsController::class,'create'])->name('admin.coupon.create');
		Route::post('/store', [CouponsController::class,'store'])->name('admin.coupon.store');
		Route::get('/edit/{id}', [CouponsController::class,'edit'])->name('admin.coupon.edit');
		Route::post('/update', [CouponsController::class,'update'])->name('admin.coupon.update');
		Route::get('/delete/{id}', [CouponsController::class,'destroy'])->name('admin.coupon.delete');
		Route::post('/import-excel', [CouponsController::class,'import'])->name('admin.coupon.import');
		Route::post('/delete-all', [CouponsController::class,'deleteAll'])->name('admin.coupon.deleteAll');
      });
    //@end::coupon


	//Categories   
	Route::group(['prefix' => 'categories'], function () {
	  
		Route::get('/', [CategoryController::class,'index'])->name('admin.categories.index');
		Route::get('/create', [CategoryController::class,'create'])->name('admin.categories.create');
		Route::post('/store', [CategoryController::class,'store'])->name('admin.categories.store');
		Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('admin.categories.edit');
		Route::post('/update', [CategoryController::class,'update'])->name('admin.categories.update');
		Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('admin.categories.delete');
	   
	});
//@end::Categories

});