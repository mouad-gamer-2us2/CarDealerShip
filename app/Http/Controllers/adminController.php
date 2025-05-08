<?php

namespace App\Http\Controllers;

use App\Models\car;

use App\Models\body;
use App\Models\item;
use App\Models\User;
use App\Models\brand;
use App\Models\photo;
use App\Models\equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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

    // 3. Enregistrer les équipements
    if ($request->has('equipements')) {
        foreach ($request->equipements as $equipement) {
            if ($equipement) {
                equipement::create([
                    'equipement_name' => $equipement,
                    'car_eq' => $car->car_id,
                ]);
            }
        }
    }

    // 4. Enregistrer les items
    if ($request->has('items')) {
        foreach ($request->items as $item) {
            if ($item) {
                item::create([
                    'item_name' => $item,
                    'car_it' => $car->car_id,
                ]);
            }
        }
    }

    // 5. Enregistrer les images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('cars', 'public');
            photo::create([
                'image' => $path,
                'car_image' => $car->car_id,
            ]);
        }
    }

    return redirect()->route('cars.create')->with('success', 'Car listed successfully!');
}

public function showAllCars()
{
    $cars = car::with(['brand', 'photos'])->paginate(6); 

    return view('admins.adminCarList', compact('cars'));
}

}
