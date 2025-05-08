<x-admin-layout title="Car Listings">
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">Car Listings</h2>

        @if($cars->count() > 0)
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
            <div class="alert alert-info text-center">
                No cars found.
            </div>
        @endif
    </div>
</x-admin-layout>
