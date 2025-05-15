<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;

class buyerController extends Controller
{
    // Affiche toutes les marques
    public function showBrand()
    {

        $brands = Brand::paginate(6);  
        return view('buyers.Brands', compact('brands'));  
    }

    // Affiche toutes les voitures
    public function showCar()
    {
        $cars = Car::paginate(6); 
        return view('buyers.Cars', compact('cars'));  
    }

    // Affiche les détails d'une voiture
    public function show($id)
{
    $car = Car::with(['brand', 'photos', 'body'])->findOrFail($id);
    return view('buyers.Car', compact('car'));

}

public function showCarBrand(Request $request)
{
    $brandId = $request->query('brand');

    if ($brandId) {
        $cars = Car::where('Make', $brandId)
                   ->with(['brand', 'photos'])
                   ->paginate(6);
        $brand = Brand::find($brandId);
    } else {
        $cars = Car::with(['Make', 'photos'])->paginate(6);
        $brand = null;
    }

    return view('buyers.Cars', compact('cars', 'brand'));
}




}
