@if($brands->count())
    <div class="row">
        @foreach($brands as $brand)
            <div class="col-md-4 mb-4">
                <x-brand-card :brand="$brand" />
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $brands->links() }}
    </div>
@else
    <div class="alert alert-info text-center" role="alert">
        No brands found.
    </div>
@endif
