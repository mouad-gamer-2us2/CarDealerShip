<x-admin-layout title="admin page" >

    <!-- Your forms or main content go here -->
    <div class="container mt-5">
      
       <!-- Car Make Form -->
       <div class="form-section">
         <h2>Add Car Make</h2>
         <form action="{{route('brands.update',$brand->brand_id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="mb-3">
             <label for="makeName" class="form-label">Brand name</label>
             <input type="text" class="form-control" id="makeName" name="brand_name" value="{{$brand->brand_name}}" required>
             <x-errors field="brand_name"/>
           </div>
           <div class="mb-3">
             <label for="makeDescription" class="form-label">Brand description </label>
             <textarea class="form-control" id="makeDescription" name="brand_description" rows="3" required>
                {{$brand->brand_description}}
             </textarea>
             <x-errors field="brand_description"/>
           </div>
           <div class="mb-3">
             <label for="makeLogo" class="form-label">Brand logo </label>
             <input class="form-control" type="file" id="makeLogo" name="brand_logo" >
             <x-errors field="brand_logo"/>
           </div>
           <button type="submit" class="btn btn-primary">Add</button>
         </form>
       </div>
     </div>
   
   </x-admin-layout>