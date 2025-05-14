<x-admin-layout title="Buyer Users">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase">List of Buyers</h2>
            <p class="text-muted">Search by name or email to find a buyer quickly.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-info text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="search-buyer" class="form-control form-control-lg" placeholder="Search buyers..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="buyer-results">
            <div class="text-center py-5">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search-buyer');
            const resultsContainer = document.getElementById('buyer-results');

            const fetchBuyers = (term = '') => {
                fetch(`{{ route('buyers.search') }}?term=${encodeURIComponent(term)}`)
                    .then(res => res.text())
                    .then(html => resultsContainer.innerHTML = html);
            };

            searchInput.addEventListener('input', () => {
                fetchBuyers(searchInput.value);
            });

            fetchBuyers(); // initial load
        });
    </script>
</x-admin-layout>