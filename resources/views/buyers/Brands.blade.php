<x-user-layout title="Brands Listing Page">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase">Brand List</h2>
            <p class="text-muted">Search by brand name to find the one you're interested in.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-dark text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="search-brand" class="form-control form-control-lg" placeholder="Search brands..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="brand-results">
            @include('partials.brand.brand_results1', ['brands' => $brands])
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-brand');
            const resultsContainer = document.getElementById('brand-results');

            function fetchResults(term = '', page = 1) {
                fetch(`{{ route('brands.search') }}?term=${encodeURIComponent(term)}&page=${page}`)
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
