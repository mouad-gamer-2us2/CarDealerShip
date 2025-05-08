<?php

namespace App\Http\Controllers;

use App\Models\body;

use App\Models\User;
use App\Models\brand;
use Illuminate\Http\Request;
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
}
