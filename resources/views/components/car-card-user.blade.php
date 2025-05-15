<div>
    <div class="card h-100 shadow-sm ">
  <a href="{{ route('seulCar', $car->car_id) }}">
    <img src="{{ asset('storage/' . $car->photos->first()?->image) }}" 
         alt="Car Image" 
         class="card-img-top img-fluid" 
         style="object-fit: cover; height: 250px;">
 </a>
    <div class="card-body">
        <h5 class="card-title">{{ $car->brand->brand_name }}</h5>
        <p class="card-text">
            <strong>Model:</strong> {{ $car->model }}<br>
            <strong>Engine:</strong> {{ $car->engine }}<br>
            <strong>HP:</strong> {{ $car->horsepower }} HP<br>
            <strong>Mileage:</strong> {{ $car->mileage }} Miles<br>
            <strong>Price:</strong> ${{ number_format($car->price, 2) }}
        </p>

        
    </div>
</div>

</div>