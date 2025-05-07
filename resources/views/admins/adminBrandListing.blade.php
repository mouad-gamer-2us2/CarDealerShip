<x-admin-layout title="Brands Listing Page">

    <div class="container mt-5">
      <h2 class="mb-4">Brand List</h2>
  
      <div class="row">
        @forelse($brands as $brand)
          <div class="col-md-4 mb-4">
            <x-brand-card :brand="$brand" />
          </div>
        @empty
          <p class="text-center">No brands found.</p>
        @endforelse
      </div>
  
      <div class="d-flex justify-content-center">
        {{ $brands->links() }}
      </div>
    </div>
  
  </x-admin-layout>
  