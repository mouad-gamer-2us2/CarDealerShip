<div>
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
            

            <!-- Update -->
           

            <!-- Delete -->
            
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

       
      </div>
    </div>
  </div>
</div>

</div>