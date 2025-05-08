<x-admin-layout title="Brands Listing Page">

    <div class="container mt-5">
      <h2 class="mb-4 fw-bold">Brand List</h2>
  
      <div class="row">
        @forelse($brands as $brand)
          <div class="col-md-4 mb-4">
            <x-brand-card :brand="$brand" />
          </div>
        @empty
        <div class="alert alert-info text-center" role="alert">
          No brands found.
      </div>
        @endforelse
      </div>
  
      <div class="d-flex justify-content-end mt-4">
        {{ $brands->links() }}
      </div>
    </div>
  
  </x-admin-layout>
  