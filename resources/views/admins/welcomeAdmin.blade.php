<x-admin-layout title="admin page">

  <div class="container mt-5">

    <!-- Body Style Form -->
    <div class="form-section mb-5">
      <h2 class="mb-4">Add Body Style</h2>
      <form action="{{ route('bodies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="bodyName" class="form-label">Body type</label>
          <input type="text" class="form-control" id="bodyName" name="body_type" value="{{ old('body_type') }}" required>
          <x-errors field="body_type" />
        </div>

        <div class="mb-3">
          <label for="bodyDescription" class="form-label">Body description</label>
          <textarea class="form-control" id="bodyDescription" name="body_description" rows="3" required>{{ old('body_description') }}</textarea>
          <x-errors field="body_description" />
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>

    <!-- Car Make Form -->
    <div class="form-section">
      <h2 class="mb-4">Add Car Make</h2>
      <form action="{{ route('admin.storeBrand') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="makeName" class="form-label">Brand name</label>
          <input type="text" class="form-control" id="makeName" name="brand_name" value="{{ old('brand_name') }}" required>
          <x-errors field="brand_name" />
        </div>

        <div class="mb-3">
          <label for="makeDescription" class="form-label">Brand description</label>
          <textarea class="form-control" id="makeDescription" name="brand_description" rows="3" required>{{ old('brand_description') }}</textarea>
          <x-errors field="brand_description" />
        </div>

        <div class="mb-3">
          <label for="makeLogo" class="form-label">Brand logo</label>
          <input class="form-control" type="file" id="makeLogo" name="brand_logo" required>
          <x-errors field="brand_logo" />
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>

  </div>

</x-admin-layout>