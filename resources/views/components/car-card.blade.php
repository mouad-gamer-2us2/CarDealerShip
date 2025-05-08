@props(['car'])

<div class="card h-100 shadow-sm ">
    <img src="{{ asset('storage/' . $car->photos->first()?->image) }}" 
         alt="Car Image" 
         class="card-img-top img-fluid" 
         style="object-fit: cover; height: 200px;">

    <div class="card-body">
        <h5 class="card-title">{{ $car->brand->brand_name }}</h5>
        <p class="card-text">
            <strong>Model:</strong> {{ $car->model }}<br>
            <strong>Engine:</strong> {{ $car->engine }}<br>
            <strong>HP:</strong> {{ $car->horsepower }} HP<br>
            <strong>Mileage:</strong> {{ $car->mileage }} Miles<br>
            <strong>Price:</strong> ${{ number_format($car->price, 2) }}
        </p>

        <div class="d-flex justify-content-center gap-2 mt-3">
            <a href="" class="btn btn-outline-primary btn-sm">More Info</a>
            <a href="" class="btn btn-outline-warning btn-sm">Update</a>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>
