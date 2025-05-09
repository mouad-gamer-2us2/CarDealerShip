<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\buyerController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;

//--------------------------- general stuff -----------------------------------------------------

Route::get('/', [GeneralController::class,'showGeneral'])->name('general.page');

Route::get('/aboutUs',[GeneralController::class,'aboutUs'])->name('general.aboutUs') ;

Route::get('/contactUs',[GeneralController::class,'contactUs'])->name('general.contactUs') ;

//--------------------------- admin stuff --------------------------------------------------------

 


Route::match(['get', 'post'], '/welcomeAdmin', [adminController::class,'welcomeAdmin'])->name('admin.welcomeAdmin');



Route::post('/welcomeAdmin/storeBrand',[adminController::class , 'storeBrand'])->name('admin.storeBrand') ;

Route::get('/adminBrandListing',[adminController::class , 'showAdminBrands'])->name('admin.showAdminBrands') ;

Route::get('/brands/{id}/edit', [adminController::class, 'editBrand'])->name('brands.edit');

Route::put('/brands/{id}', [adminController::class, 'updateBrand'])->name('brands.update');

Route::delete('/brands/{id}', [adminController::class, 'destroyBrand'])->name('brands.destroy');

Route::get('/bodyStyles', [adminController::class, 'showBodyStyles'])->name('admin.showBodyStyles');

Route::post('/bodyStyles/store', [AdminController::class, 'storeBodyStyles'])->name('bodies.store');

Route::delete('/bodyStyles/{id}', [adminController::class, 'destroyBodyStyle'])->name('bodies.destroy');

Route::get('/bodyStyles/{id}/edit', [adminController::class, 'editBodyStyle'])->name('bodies.edit');

Route::put('/bodyStyles/{id}', [adminController::class, 'updateBodyStyle'])->name('bodies.update');

Route::get('/buyers', [adminController::class, 'showBuyers'])->name('admin.showBuyers');

Route::get('/cars/createCar', [adminController::class, 'createCar'])->name('cars.create');

Route::post('/cars/storeCar', [adminController::class, 'storeCar'])->name('cars.store');

Route::get('/admin/cars', [adminController::class, 'showAllCars'])->name('admin.showCars');

Route::get('/cars/{id}', [adminController::class, 'showCar'])->name('cars.show');

Route::delete('/cars/{id}', [adminController::class, 'destroyCar'])->name('cars.destroy');

Route::post('/cars/{car}/photos', [adminController::class, 'storePhoto'])->name('photos.store');

Route::post('/cars/{car}/equipements', [adminController::class, 'storeEquipement'])->name('equipements.store');

Route::post('/cars/{car}/items', [adminController::class, 'storeItem'])->name('items.store');

Route::put('/items/{item}', [adminController::class, 'updateItem'])->name('items.update');

Route::put('/equipements/{id}', [adminController::class, 'updateEquipement'])->name('equipements.update');

Route::put('/cars/{id}/updateFields', [adminController::class, 'updateCarFields'])->name('cars.updateFields');

Route::delete('/photos/{id}', [adminController::class, 'destroyPhoto'])->name('photos.destroy');

Route::delete('/items/{id}', [adminController::class, 'destroyItem'])->name('items.destroy');

Route::delete('/equipements/{id}', [adminController::class, 'destroyEquipement'])->name('equipements.destroy');

//--------------------------- buyer stuff --------------------------------------------------------

Route::get('/welcomeBuyer', [buyerController::class,'welcomeBuyer'])->name('buyer.welcomeBuyer');

//---------------------------- auth stuff --------------------------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';