<div class="row">
    @forelse($brands as $brand)
        <div class="col-md-4 mb-4">
            <a href="{{ route('CarBrand', ['brand' => $brand->brand_id]) }}">
                <x-brand-card-user :brand="$brand" />
            </a>
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
