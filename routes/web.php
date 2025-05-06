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

 

Route::get('/welcomeAdmin', [adminController::class,'welcomeAdmin'])->name('admin.welcomeAdmin');



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