<?php

namespace App\Http\Controllers;

use App\Models\car;

use App\Models\body;
use App\Models\item;
use App\Models\User;
use App\Models\brand;
use App\Models\photo;
use App\Mail\NewCarListed;
use App\Models\equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class adminController extends Controller
{
    public function welcomeAdmin(Request $request)
    {
        
        return view('admins.welcomeAdmin') ;
    }

    public function storeBrand (Request $request)
    {

        
        $formfields = $request->validate([
            'brand_name' => 'required|unique:brands,brand_name',
            'brand_description' => 'required|min:30',
            'brand_logo' => 'required|image|mimes:png,jpg,jpeg,svg|dimensions:width=500,height=500',
        ]);

        $brand_logo = $request->file('brand_logo')->store('brands','public') ;

        $formfields['brand_logo'] = $brand_logo ; 


        brand::create($formfields) ; 

        return to_route('admin.showAdminBrands')->with('success', 'Brand created successfully');

    }

    public function showAdminBrands ()
    {
        $brands = brand::paginate(6) ;

        return view('admins.adminBrandListing',compact('brands'));
    }

    public function searchBrands(Request $request)
{
    $term = $request->term;

    $brands = brand::where('brand_name', 'like', "%{$term}%")
                    ->orWhere('brand_description', 'like', "%{$term}%")
                    ->paginate(6);

    return view('partials.brand.brand_results', compact('brands'))->render();
}


    public function editBrand($id)
{
    $brand = Brand::findOrFail($id);
    return view('admins.editBrand', compact('brand'));
}

public function updateBrand(Request $request, $id)
{
    $brand = Brand::findOrFail($id);

    $formfields = $request->validate([
        'brand_name' => 'required|unique:brands,brand_name,' . $brand->id . ',brand_id',
        'brand_description' => 'required|min:30',
        'brand_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|dimensions:width=500,height=500',
    ]);

    if ($request->hasFile('brand_logo')) {
        $brand_logo = $request->file('brand_logo')->store('brands', 'public');
        $formfields['brand_logo'] = $brand_logo;
    }

    $brand->update($formfields);

    return redirect()->route('admin.showAdminBrands')->with('success', 'Brand updated successfully');
}

public function destroyBrand($id)
{
    $brand = Brand::findOrFail($id);

    
    if ($brand->brand_logo && Storage::disk('public')->exists($brand->brand_logo)) {
        Storage::disk('public')->delete($brand->brand_logo);
    }

    $brand->delete(); 

    return redirect()->route('admin.showAdminBrands')->with('success', 'Brand deleted successfully');
}

public function showBodyStyles ()
{
    $bodies = body::paginate(6); 
    return view('admins.adminBodyStyles', compact('bodies'));
}

public function storeBodyStyles(Request $request)
{
    $formfields = $request->validate([
        'body_type' => 'required|string|max:255|unique:bodies,body_type',
        'body_description' => 'required|string|min:10',
    ]);

    body::create($formfields);

    return redirect()->route('admin.showBodyStyles')->with('success', 'Body style added successfully');
}

public function destroyBodyStyle($id)
{
    $body = Body::findOrFail($id);
    $body->delete(); 

    return redirect()->route('admin.showBodyStyles')->with('success', 'Body style deleted successfully.');
}

public function editBodyStyle($id)
{
    $body = body::findOrFail($id);

    return view('admins.editBodyStyle', compact('body'));
}

public function updateBodyStyle(Request $request, $id)
{
    $body = body::findOrFail($id);

    $formfields = $request->validate([
        'body_type' => 'required|string|max:255|unique:bodies,body_type,' . $body->body_id . ',body_id',
        'body_description' => 'required|string|min:10',
    ]);

    $body->update($formfields);

    return redirect()->route('admin.showBodyStyles')->with('success', 'Body style updated successfully.');
}

public function showBuyers()
{
    $buyers = User::where('role', 'buyer')->paginate(6);

    return view('admins.adminBuyers', compact('buyers'));
}

public function searchBuyers(Request $request)
{
    $term = $request->term;

    $buyers = User::where('role', 'buyer')
                ->where(function ($query) use ($term) {
                    $query->where('name', 'like', "%{$term}%")
                          ->orWhere('email', 'like', "%{$term}%");
                })
                ->paginate(6);

    return view('partials.buyer.buyer_results', compact('buyers'))->render();
}

public function destroyBuyer($id)
{
    $buyer = User::findOrFail($id);
    if ($buyer->role === 'buyer') {
        $buyer->delete();
        return back()->with('success', 'Buyer deleted successfully.');
    }

    return back()->with('error', 'Invalid operation. Only buyers can be deleted.');
}

public function createCar()
{
    $brands = brand::all();
    $bodies = body::all();

    return view('admins.createCar', compact('brands', 'bodies'));
}


public function storeCar(Request $request)
{
    
    $validated = $request->validate([
        'make' => 'required|exists:brands,brand_id',
        'model' => 'required|string|max:255',
        'engine' => 'required|string|max:255',
        'body_style' => 'required|exists:bodies,body_id',
        'drivetrain' => 'required|string|max:255',
        'transmission' => 'required|string|max:255',
        'horsepower' => 'required|integer',
        'mileage' => 'required|integer',
        'vin' => 'required|string|unique:cars,vin',
        'exterior_color' => 'required|string|max:255',
        'interior_color' => 'required|string|max:255',
        'condition' => 'required|in:new,used',
        'price' => 'required|numeric|min:0',
        'car_description' => 'required|string|min:10',
        'modified' => 'required|boolean',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // 2. Create the car
    $car = car::create([
        'make' => $request->make,
        'model' => $request->model,
        'engine' => $request->engine,
        'body_style' => $request->body_style,
        'drivetrain' => $request->drivetrain,
        'transmission' => $request->transmission,
        'horsepower' => $request->horsepower,
        'mileage' => $request->mileage,
        'vin' => $request->vin,
        'status' => 'available',
        'exterior_color' => $request->exterior_color,
        'interior_color' => $request->interior_color,
        'condition' => $request->condition,
        'price' => $request->price,
        'car_description' => $request->car_description,
        'modified' => $request->modified,
        'listed_by' => Auth::id(),
    ]);

    // 3. Save Equipments
    if ($request->has('equipements')) {
        foreach ($request->equipements as $equipement_name) {
            if ($equipement_name) {
                equipement::create([
                    'equipement_name' => $equipement_name,
                    'car_eq' => $car->car_id,
                ]);
            }
        }
    }

    // 4. Save Items
    if ($request->has('items')) {
        foreach ($request->items as $item_name) {
            if ($item_name) {
                item::create([
                    'item_name' => $item_name,
                    'car_it' => $car->car_id,
                ]);
            }
        }
    }

    // 5. Save Images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('cars', 'public');
            photo::create([
                'image' => $path,
                'car_image' => $car->car_id,
            ]);
        }
    }

    // 6. Notify all buyers by email
    $buyers = User::where('role', 'buyer')->pluck('email');
    foreach ($buyers as $email) {
        Mail::to($email)->send(new NewCarListed($car));
    }

    return redirect()->route('admin.showCars')->with('success', 'Car listed successfully and buyers notified!');
}


public function showAllCars()
{
    $cars = car::with(['brand', 'photos'])   
                ->where('status', '!=', 'sold')  
                ->paginate(6);

    return view('admins.adminCarList', compact('cars'));
}

public function searchAvailableCars(Request $request)
{
    $term = $request->term;

    $cars = Car::with(['brand', 'photos', 'body'])
        ->where('status', 'available')
        ->where(function ($query) use ($term) {
            $query->whereHas('brand', fn($q) => $q->where('brand_name', 'like', "%{$term}%"))
                  ->orWhere('model', 'like', "%{$term}%")
                  ->orWhere('engine', 'like', "%{$term}%")
                  ->orWhere('vin', 'like', "%{$term}%")
                  ->orWhere('transmission', 'like', "%{$term}%")
                  ->orWhere('drivetrain', 'like', "%{$term}%")
                  ->orWhere('horsepower', 'like', "%{$term}%")
                  ->orWhere('mileage', 'like', "%{$term}%")
                  ->orWhere('exterior_color', 'like', "%{$term}%")
                  ->orWhere('interior_color', 'like', "%{$term}%")
                  ->orWhere('condition', 'like', "%{$term}%");
        })
        ->paginate(6);

    return view('partials.car.available_results', compact('cars'))->render();
}

public function showCar($id)
{
    $car = Car::with(['brand', 'body', 'photos', 'equipements', 'items'])->findOrFail($id);

    return view('admins.adminCarDetails', compact('car'));
}

public function destroyCar($id)
{
    $car = Car::findOrFail($id);

   
    foreach ($car->photos as $photo) {
        if (Storage::disk('public')->exists($photo->image)) {
            Storage::disk('public')->delete($photo->image);
        }
        $photo->delete(); 
    }

    
    $car->items()->delete();
    $car->equipements()->delete();

    
    $car->delete();

    return redirect()->route('admin.showCars')->with('success', 'Car deleted successfully.');
}

public function storePhoto(Request $request, $carId)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $car = car::findOrFail($carId);

    foreach ($request->file('images') as $image) {
        $path = $image->store('cars', 'public');
        photo::create([
            'image' => $path,
            'car_image' => $car->car_id,
        ]);
    }

    return redirect()->back()->with('success', 'Photos added successfully!');
}

public function storeEquipement(Request $request, $carId)
{
    $request->validate([
        'equipements' => 'required|array',
        'equipements.*' => 'required|string|max:255',
    ]);

    foreach ($request->equipements as $name) {
        equipement::create([
            'equipement_name' => $name,
            'car_eq' => $carId,
        ]);
    }

    return redirect()->back()->with('success', 'Equipment(s) added successfully.');
}

public function storeItem(Request $request, $carId)
{
    $request->validate([
        'items' => 'required|array',
        'items.*' => 'required|string|max:255',
    ]);

    foreach ($request->items as $itemName) {
        item::create([
            'item_name' => $itemName,
            'car_it' => $carId,
        ]);
    }

    return redirect()->back()->with('success', 'Item(s) added successfully.');
}

public function updateItem(Request $request, $id)
{
    $request->validate([
        'item_name' => 'required|string|max:255',
    ]);

    $item = item::findOrFail($id);
    $item->update(['item_name' => $request->item_name]);

    return redirect()->back()->with('success', 'Item updated successfully.');
}

public function updateEquipement(Request $request, $id)
{
    $equipement = equipement::findOrFail($id);

    $request->validate([
        'equipement_name' => 'required|string|max:255',
    ]);

    $equipement->update([
        'equipement_name' => $request->equipement_name,
    ]);

    return redirect()->back()->with('success', 'Equipement updated successfully.');
}


public function updateCarFields(Request $request, $id)
{
    $car = car::findOrFail($id);

    $validated = $request->validate([
        'model' => 'required|string|max:255',
        'engine' => 'required|string|max:255',
        'drivetrain' => 'required|string|max:255',
        'transmission' => 'required|string|max:255',
        'horsepower' => 'required|integer',
        'mileage' => 'required|integer',
        'vin' => 'required|string|unique:cars,vin,' . $car->car_id . ',car_id',
        'exterior_color' => 'required|string|max:255',
        'interior_color' => 'required|string|max:255',
        'condition' => 'required|in:new,used',
    ]);

    $car->update($validated);

    return redirect()->back()->with('success', 'Car details updated successfully!');
}

public function destroyPhoto($id)
{
    $photo = photo::findOrFail($id);
    if (Storage::disk('public')->exists($photo->image)) {
        Storage::disk('public')->delete($photo->image);
    }
    $photo->delete();

    return redirect()->back()->with('success', 'Photo deleted successfully.');
}

public function destroyItem($id)
{
    $item = item::findOrFail($id);
    $item->delete();

    return redirect()->back()->with('success', 'Item deleted successfully.');
}

public function destroyEquipement($id)
{
    $equipement = equipement::findOrFail($id);
    $equipement->delete();

    return redirect()->back()->with('success', 'Equipment deleted successfully.');
}

public function updateDescription(Request $request, $id)
{
    $request->validate([
        'car_description' => 'required|string|min:10',
    ]);

    $car = car::findOrFail($id);
    $car->update(['car_description' => $request->car_description]);

    return redirect()->back()->with('success', 'Description updated successfully.');
}

public function updatePrice(Request $request, $id)
{
    $request->validate([
        'price' => 'required|numeric|min:0',
    ]);

    $car = car::findOrFail($id);
    $car->update(['price' => $request->price]);

    return redirect()->back()->with('success', 'Price updated successfully.');
}



public function showSellCarForm($id)
{
    $car = Car::findOrFail($id);
    return view('admins.sellCar', compact('car'));
}

public function sellCarToBuyer(Request $request, $id)
{
    $request->validate([
        'buyer_id' => 'required|exists:users,id',
    ]);

    $car = Car::findOrFail($id);
    $car->bought_by = $request->buyer_id;
    $car->status = 'sold';
    $car->save();

    return redirect()->route('admin.showCars')->with('success', 'Car sold successfully.');
}

public function showSoldCars()
{
    $cars = Car::with(['brand', 'body', 'photos'])
        ->where('status', 'sold')
        ->paginate(6); 

    return view('admins.soldCars', compact('cars')); 
}


public function searchSoldCars(Request $request)
{
    $query = Car::with(['brand', 'body', 'photos'])
        ->where('status', 'sold');

    if ($request->has('term')) {
        $term = $request->term;
        $query->where(function ($q) use ($term) {
            $q->where('model', 'like', "%$term%")
              ->orWhere('engine', 'like', "%$term%")
              ->orWhere('transmission', 'like', "%$term%")
              ->orWhere('drivetrain', 'like', "%$term%")
              ->orWhere('vin', 'like', "%$term%")
              ->orWhere('exterior_color', 'like', "%$term%")
              ->orWhere('interior_color', 'like', "%$term%")
              ->orWhere('condition', 'like', "%$term%")
              ->orWhereHas('brand', fn($b) => $b->where('brand_name', 'like', "%$term%"))
              ->orWhereHas('body', fn($b) => $b->where('body_type', 'like', "%$term%"));
        });
    }

    
    $cars = $query->paginate(6);

    return view('partials.car.sold_results', compact('cars'))->render();
}


public function makeCarAvailable($id)
{
    $car = Car::findOrFail($id);
    $car->status = 'available';
    $car->bought_by = null;
    $car->save();

    return redirect()->back()->with('success', 'Car marked as available.');
}

public function dashboard()
{
    return view('admins.dashboard');
}


}
