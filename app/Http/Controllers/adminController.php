<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function welcomeAdmin()
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

}
