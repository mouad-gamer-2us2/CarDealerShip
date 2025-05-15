<x-admin-layout title="admin page">
    <div class="container mt-5">
        <!-- Car Make Edit Form -->
        <div class="form-section">
            <h2>Edit Car Make</h2>

            <form action="{{ route('brands.update', $brand->brand_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Brand Name -->
                <div class="mb-3">
                    <label for="makeName" class="form-label">Brand name</label>
                    <input type="text"
                           class="form-control @error('brand_name') is-invalid @enderror"
                           id="makeName"
                           name="brand_name"
                           value="{{ old('brand_name', $brand->brand_name) }}"
                           required>
                    <x-errors field="brand_name"/>
                </div>

                <!-- Brand Description -->
                <div class="mb-3">
                    <label for="makeDescription" class="form-label">Brand description</label>
                    <textarea class="form-control @error('brand_description') is-invalid @enderror"
                              id="makeDescription"
                              name="brand_description"
                              rows="3"
                              required>{{ old('brand_description', $brand->brand_description) }}</textarea>
                    <x-errors field="brand_description"/>
                </div>

                <!-- Brand Logo -->
                <div class="mb-3">
                    <label for="makeLogo" class="form-label">Brand logo (optional)</label>
                    <input class="form-control @error('brand_logo') is-invalid @enderror"
                           type="file"
                           id="makeLogo"
                           name="brand_logo">
                    <x-errors field="brand_logo"/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-admin-layout>