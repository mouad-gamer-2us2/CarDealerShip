<x-user-layout title="Car Listings">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase">Car Listings</h2>
            <p class="text-muted">Search by brand, model, horsepower, price, or engine to find the car you want.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-dark text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="search-car" class="form-control form-control-lg" placeholder="Search cars..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="car-results">
            @include('partials.car.user_results', ['cars' => $cars])
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-car');
            const resultsContainer = document.getElementById('car-results');

            function fetchResults(term = '', page = 1) {
                fetch(`{{ route('cars.user.search') }}?term=${encodeURIComponent(term)}&page=${page}`)
                    .then(res => res.text())
                    .then(html => resultsContainer.innerHTML = html);
            }

            searchInput.addEventListener('input', () => {
                fetchResults(searchInput.value);
            });

            document.addEventListener('click', function (e) {
                const target = e.target.closest('.pagination a');
                if (target) {
                    e.preventDefault();
                    const page = new URL(target.href).searchParams.get('page');
                    const term = searchInput.value;
                    fetchResults(term, page);
                }
            });

            fetchResults(); // initial load
        });
    </script>
</x-user-layout>
