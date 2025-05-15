@props(['car'])

<div class="container py-5" style="min-height: 80vh;">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="row g-5">
            <!-- Partie image -->
            <div class="col-md-6">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $car->photos->first()?->image) }}"
                         alt="{{ $car->brand->brand_name . ' ' . $car->model }}"
                         class="img-fluid rounded shadow-sm"
                         style="max-height: 400px; object-fit: cover; width: 100%;">
                    
                </div>
            </div>

            <!-- Partie infos -->
            <div class="col-md-6">
                <h2 class="fw-bold mb-2">{{ $car->brand->brand_name }} {{ $car->model }}</h2>

                <p class="text-muted mb-1">
                    <i class="bi bi-geo-alt-fill me-1"></i>
                    {{ $car->location ?? 'Non spécifiée' }} {{-- optionnel si tu as une colonne location --}}
                </p>

                <p class="text-muted mb-3">
                    Publiée il y a {{ $car->created_at->diffForHumans() }}
                </p>

                <h4 class="text-primary fw-bold mb-4">
                    {{ number_format($car->price, 0, ',', ' ') }} DH
                </h4>

                <ul class="list-unstyled text-dark mb-4" style="line-height: 1.8;">
                    
                    <li><strong>Motorisation :</strong> {{ $car->engine }}</li>
                    <li><strong>Puissance :</strong> {{ $car->horsepower }} HP</li>
                    <li><strong>Transmission :</strong> {{ $car->transmission }}</li>
                   
                    <li><strong>horsepower :</strong> {{ $car->horsepower }} km</li>
                    <li><strong>Couleur exterieur  :</strong> {{ $car->exterior_color }}</li>
                    <li><strong>Couleur interior :</strong> {{ $car->interior_color }}</li>
                    <li><strong>Style :</strong> {{ $car->bodyStyle->name ?? 'Non précisé' }}</li>
                </ul>

                <div>
                    <h5 class="fw-semibold">Description</h5>
                    <p class="text-muted">{{ $car->car_description }}</p>
                </div>

                <a href="{{ route('Car') }}" class="btn btn-outline-dark mt-4">
                    ← Retour aux voitures
                </a>
            </div>
        </div>
    </div>
</div>
