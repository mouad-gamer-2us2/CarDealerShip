@if($cars->count())
    <div class="row g-4">
        @foreach($cars as $car)
            <div class="col-md-4">
                <x-sold-car-card :car="$car" />
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $cars->links() }}
    </div>
@else
    <div class="alert alert-info text-center">
        No sold cars found.
    </div>
@endif

