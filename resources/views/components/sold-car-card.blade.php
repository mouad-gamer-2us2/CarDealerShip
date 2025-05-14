@props(['car'])

<div class="card h-100 shadow-sm ">
    <img src="{{ asset('storage/' . $car->photos->first()?->image) }}" 
         alt="Car Image" 
         class="card-img-top img-fluid" 
         style="object-fit: cover; height: 250px;">

    <div class="card-body">
        <h5 class="card-title">{{ $car->brand->brand_name }}</h5>
        <p class="card-text">
            <strong>Model:</strong> {{ $car->model }}<br>
            <strong>Engine:</strong> {{ $car->engine }}<br>
            <strong>HP:</strong> {{ $car->horsepower }} HP<br>
            <strong>Mileage:</strong> {{ $car->mileage }} Miles<br>
            <strong>Price:</strong> ${{ number_format($car->price, 2) }}
        </p>

        <div class="d-flex justify-content-center mt-3">
            <form action="{{ route('cars.makeAvailable', $car->car_id) }}" method="POST" class="me-2">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-outline-warning btn-sm w-100">
                    <i class="bi bi-arrow-repeat me-1"></i> Make Available
                </button>
            </form>
        </div>

    </div>
</div>
