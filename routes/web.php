<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralController::class,'showGeneral'])->name('general.page');

Route::get('/aboutUs',[GeneralController::class,'aboutUs'])->name('general.aboutUs') ;

Route::get('/contactUs',[GeneralController::class,'contactUs'])->name('general.contactUs') ;