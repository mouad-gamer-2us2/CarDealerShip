<?php

use App\Models\car;
use App\Models\User;
use App\Mail\NewCarListed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\buyerController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SimulatorController;

//--------------------------- general stuff -----------------------------------------------------

Route::get('/', [GeneralController::class,'showGeneral'])->name('general.page');

Route::get('/aboutUs',[GeneralController::class,'aboutUs'])->name('general.aboutUs') ;

Route::get('/contactUs',[GeneralController::class,'contactUs'])->name('general.contactUs') ;


// test the email with this : 

 Route::get('/test-mail', function () {
    $car = car::latest()->with('brand')->first(); // any car
    Mail::to('hman3787@gmail.com')->send(new NewCarListed($car));
    return 'Test email sent.';
});

//--------------------------- admin stuff --------------------------------------------------------




Route::match(['get', 'post'], '/welcomeAdmin', [adminController::class,'welcomeAdmin'])->name('admin.welcomeAdmin');



Route::post('/welcomeAdmin/storeBrand',[adminController::class , 'storeBrand'])->name('admin.storeBrand') ;

Route::get('/adminBrandListing',[adminController::class , 'showAdminBrands'])->name('admin.showAdminBrands') ;

Route::get('/admin/brands/search', [adminController::class, 'searchBrands'])->name('brands.search');


Route::get('/brands/{id}/edit', [adminController::class, 'editBrand'])->name('brands.edit');

Route::put('/brands/{id}', [adminController::class, 'updateBrand'])->name('brands.update');

Route::delete('/brands/{id}', [adminController::class, 'destroyBrand'])->name('brands.destroy');

Route::get('/bodyStyles', [adminController::class, 'showBodyStyles'])->name('admin.showBodyStyles');

Route::post('/bodyStyles/store', [AdminController::class, 'storeBodyStyles'])->name('bodies.store');

Route::delete('/bodyStyles/{id}', [adminController::class, 'destroyBodyStyle'])->name('bodies.destroy');

Route::get('/bodyStyles/{id}/edit', [adminController::class, 'editBodyStyle'])->name('bodies.edit');

Route::put('/bodyStyles/{id}', [adminController::class, 'updateBodyStyle'])->name('bodies.update');

Route::get('/buyers', [adminController::class, 'showBuyers'])->name('admin.showBuyers');

Route::get('/buyers/search', [adminController::class, 'searchBuyers'])->name('buyers.search');

Route::delete('/buyers/{id}', [adminController::class, 'destroyBuyer'])->name('buyers.destroy');

Route::get('/cars/createCar', [adminController::class, 'createCar'])->name('cars.create');

Route::post('/cars/storeCar', [adminController::class, 'storeCar'])->name('cars.store');

Route::get('/admin/cars', [adminController::class, 'showAllCars'])->name('admin.showCars');



Route::get('/cars/search/available', [adminController::class, 'searchAvailableCars'])->name('cars.available.search');

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

Route::put('/cars/{id}/update-description', [adminController::class, 'updateDescription'])->name('cars.updateDescription');

Route::put('/cars/{id}/update-price', [adminController::class, 'updatePrice'])->name('cars.updatePrice');

Route::get('/cars/{id}/sell', [adminController::class, 'showSellCarForm'])->name('cars.sell.form');

Route::put('/cars/{id}/sell', [adminController::class, 'sellCarToBuyer'])->name('cars.sell');



Route::get('/api/users/search', function (Request $request) {
    $query = $request->q;

    return User::where('role', 'buyer') 
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('email', 'like', "%{$query}%");
                })
                ->select('id', 'name', 'email')
                ->limit(10)
                ->get();
});

Route::get('/admin/sold-cars', [adminController::class, 'showSoldCars'])->name('cars.sold');

Route::get('/admin/sold-cars/search', [adminController::class, 'searchSoldCars'])->name('cars.sold.search');

Route::put('/cars/{id}/make-available', [adminController::class, 'makeCarAvailable'])->name('cars.makeAvailable');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard') ;



//--------------------------- buyer stuff --------------------------------------------------------

Route::get('/Brands', [buyerController::class,'showBrand'])->name('Brand');

Route::get('/Cars', [buyerController::class,'showCar'])->name('Car');

Route::get('/buyer/cars/{id}', [buyerController::class, 'show'])->name('seulCar');

Route::get('/CarsBrand', [buyerController::class,'showCarBrand'])->name('CarBrand');

Route::get('/cars/user/search', [buyerController::class, 'searchUserCars'])->name('cars.user.search');

Route::get('/brands/search', [buyerController::class, 'searchBrand'])->name('brands.search');

Route::get('/payment-simulator', [SimulatorController::class, 'index'])->name('payment.simulator');


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