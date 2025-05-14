<x-admin-layout title="Car Details">
    <div class="container mt-5">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">
                {{ $car->brand->brand_name ?? 'Unknown Brand' }} {{ $car->model }}
            </h2>
            <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editFieldsModal">
                <i class="bi bi-pencil-square me-1"></i>Edit All car details
            </button>
        </div>

        <!-- Carousel -->
        @if($car->photos->count() > 0)
            <div id="carCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($car->photos as $key => $photo)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $photo->image) }}" class="d-block w-100" style="max-height: 500px; object-fit: contain;">
                            @if($key !== 0)
                                <form action="{{ route('photos.destroy', $photo->id_photo) }}" method="POST" class="text-center delete-form mt-2">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete an Image</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                </button>
            </div>
        @endif

        <!-- Add Photo -->
        <button class="btn btn-outline-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#addPhotoModal">+ Add Image</button>

        <!-- Price -->
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-info fw-bold">Price: ${{ number_format($car->price, 2) }}</h3>
            <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editPriceModal">
                <i class="bi bi-pencil-square"></i> Edit price
            </button>
        </div>


        <!-- Info Table -->
        <table class="table table-striped mt-4">
            <tbody>
                <tr><th>Make</th><td>{{ $car->brand->brand_name ?? 'N/A' }}</td></tr>
                <tr><th>Model</th><td>{{ $car->model }}</td></tr>
                <tr><th>Engine</th><td>{{ $car->engine }}</td></tr>
                <tr><th>Drivetrain</th><td>{{ $car->drivetrain }}</td></tr>
                <tr><th>Transmission</th><td>{{ $car->transmission }}</td></tr>
                <tr><th>Horsepower</th><td>{{ $car->horsepower }}</td></tr>
                <tr><th>Mileage</th><td>{{ $car->mileage }} km</td></tr>
                <tr><th>VIN</th><td>{{ $car->vin }}</td></tr>
                <tr><th>Body Style</th><td>{{ $car->body->body_type ?? 'N/A' }}</td></tr>
                <tr><th>Exterior Color</th><td>{{ $car->exterior_color }}</td></tr>
                <tr><th>Interior Color</th><td>{{ $car->interior_color }}</td></tr>
                <tr><th>Condition</th><td>{{ ucfirst($car->condition) }}</td></tr>
            </tbody>
        </table>

        <!-- Description -->
        <div class="mt-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Description</h5>
                <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editDescriptionModal">
                    <i class="bi bi-pencil-square"></i> Edit Description
                </button>
            </div>
            <p>{{ $car->car_description }}</p>
        </div>


        <!-- Equipments -->
        <div class="mt-4">
            <div class="d-flex justify-content-between">
                <h5>Equipments</h5>
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addEquipementModal">+ Add</button>
            </div>
            @if($car->equipements->count())
                <ul class="mt-2">
                    @foreach($car->equipements as $eq)
                        <li>
                            {{ $eq->equipement_name }}
                            <button class="btn btn-sm btn-link text-warning" data-bs-toggle="modal" data-bs-target="#editEquipementModal{{ $eq->id_equipement }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <form action="{{ route('equipements.destroy', $eq->id_equipement) }}" method="POST" class="d-inline delete-form">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash3"></i></button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Included Items -->
        <div class="mt-4">
            <div class="d-flex justify-content-between">
                <h5>Included Items</h5>
                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addItemModal">+ Add</button>
            </div>
            @if($car->items->count())
                <ul class="mt-2">
                    @foreach($car->items as $it)
                        <li>
                            {{ $it->item_name }}
                            <button class="btn btn-sm btn-link text-warning" data-bs-toggle="modal" data-bs-target="#editItemModal{{ $it->id_item }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <form action="{{ route('items.destroy', $it->id_item) }}" method="POST" class="d-inline delete-form">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash3"></i></button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Include all modals -->
        @include('partials.car.modals.add_photo', ['car' => $car])
        @include('partials.car.modals.add_equipement', ['car' => $car])
        @include('partials.car.modals.add_item', ['car' => $car])
        @include('partials.car.modals.edit_fields', ['car' => $car])
        @include('partials.car.modals.edit_equipements', ['car' => $car])
        @include('partials.car.modals.edit_items', ['car' => $car])
        @include('partials.car.modals.edit_description', ['car' => $car])
        @include('partials.car.modals.edit_price', ['car' => $car])

    </div>
</x-admin-layout>
