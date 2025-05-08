<x-admin-layout title="admin page" >

 <!-- Your forms or main content go here -->
 <div class="container mt-5">
    <!-- Body Style Form -->
    <div class="form-section mb-4">
      <h2>Add Body Style</h2>
      <form action="" method="POST" >
        @csrf
        <div class="mb-3">
          <label for="bodyName" class="form-label">Name</label>
          <input type="text" class="form-control" id="bodyName" name="name" required>
        </div>
        <div class="mb-3">
          <label for="bodyDescription" class="form-label">Description</label>
          <textarea class="form-control" id="bodyDescription" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>

    <!-- Car Make Form -->
    <div class="form-section">
      <h2>Add Car Make</h2>
      <form action="{{route('admin.storeBrand')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="makeName" class="form-label">Brand name</label>
          <input type="text" class="form-control" id="makeName" name="brand_name" required>
        </div>
        <div class="mb-3">
          <label for="makeDescription" class="form-label">Brand description </label>
          <textarea class="form-control" id="makeDescription" name="brand_description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label for="makeLogo" class="form-label">Brand logo </label>
          <input class="form-control" type="file" id="makeLogo" name="brand_logo" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>

</x-admin-layout>