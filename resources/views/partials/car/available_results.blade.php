@if($cars->count())
    <div class="row g-4">
        @foreach($cars as $car)
            <div class="col-md-4">
                <x-car-card :car="$car" />
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $cars->links() }}
    </div>
@else
    <div class="alert alert-warning text-center">No available cars match your search.</div>
@endif