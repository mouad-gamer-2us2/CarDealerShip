@props(['brand'])

<div class="card h-100 text-center shadow-sm">
    <!-- Brand Image -->
    <img src="{{ asset('storage/' . $brand->brand_logo) }}"
         alt="{{ $brand->brand_name }}"
         class="card-img-top img-fluid"
         style="object-fit: contain; aspect-ratio: 1 / 1; max-height: 300px;">

    <!-- Card Body -->
    <div class="card-body">
        <h5 class="card-title">{{ $brand->brand_name }}</h5>

        <div class="d-flex justify-content-center gap-2 mt-3">
            <!-- More Info -->
            <button class="btn btn-outline-primary btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalBrand{{ $brand->brand_id }}">
                    <i class="bi bi-zoom-in m-3"></i>
            </button>

            <!-- Update -->
            <a href="{{route('brands.edit',$brand->brand_id)}}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square m-3"></i></a>

            <!-- Delete -->
            <form action="{{ route('brands.destroy', $brand->brand_id) }}" method="POST" class="delete-form">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill m-3"></i></button>
          </form>
        </div>
    </div>
</div>

<!-- Modal (uses brand_id as unique ID) -->
<div class="modal fade" id="modalBrand{{ $brand->brand_id }}" tabindex="-1" aria-labelledby="modalBrandLabel{{ $brand->brand_id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-start">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBrandLabel{{ $brand->brand_id }}">{{ $brand->brand_name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Centered image -->
      <div class="modal-body">
        <div class="text-center mb-3">
            <img src="{{ asset('storage/' . $brand->brand_logo) }}"
                 class="img-fluid"
                 style="max-height: 250px; object-fit: contain;">
        </div>

        <p><strong>Description:</strong></p>
        <p>{{ $brand->brand_description }}</p>
        <p><strong>Created At:</strong> {{ $brand->created_at->format('d M Y') }}</p>
      </div>
    </div>
  </div>
</div>
