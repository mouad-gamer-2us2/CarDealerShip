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

        <div class="d-flex justify-content-center gap-2 mt-3">
            <a href="{{route('cars.show',$car->car_id)}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-zoom-in m-3"></i></a>
            
            <form action="{{ route('cars.destroy', $car->car_id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill m-3"></i></button>
            </form>
            <a href="" class="btn btn-outline-success btn-sm"><i class="bi bi-currency-dollar m-3"></i></a>
        </div>
    </div>
</div>
