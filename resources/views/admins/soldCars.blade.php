<x-admin-layout title="Sold Cars">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase">Sold Cars</h2>
            <p class="text-muted">Browse all sold vehicles. Use the search to filter by model, engine, VIN, etc.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-info text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="search" class="form-control form-control-lg" placeholder="Search by any field..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="car-results">
            {{-- Cards will load here via AJAX --}}
            <div class="text-center py-5">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search');
            const resultsContainer = document.getElementById('car-results');

            const fetchResults = (term = '') => {
                fetch(`{{ route('cars.sold.search') }}?term=${encodeURIComponent(term)}`)
                    .then(res => res.text())
                    .then(html => resultsContainer.innerHTML = html);
            };

            searchInput.addEventListener('input', () => {
                fetchResults(searchInput.value);
            });

            fetchResults(); // initial load
        });
    </script>
</x-admin-layout>
