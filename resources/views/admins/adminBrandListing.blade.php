<x-admin-layout title="Brands Listing Page">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase">Brand List</h2>
            <p class="text-muted">Browse all brands. Use the search to filter by name or description.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-dark text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="brand-search" class="form-control form-control-lg" placeholder="Search by name or description..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="brand-results">
            <div class="text-center py-5">
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('brand-search');
        const resultsContainer = document.getElementById('brand-results');

        function fetchResults(term = '', page = 1) {
            fetch(`{{ route('brands.search') }}?term=${encodeURIComponent(term)}&page=${page}`)
                .then(res => res.text())
                .then(html => {
                    resultsContainer.innerHTML = html;

                    // Re-bind pagination links after new HTML is inserted
                    bindPaginationLinks();
                });
        }

        function bindPaginationLinks() {
            const paginationLinks = document.querySelectorAll('#brand-results .pagination a');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = new URL(this.href);
                    const page = url.searchParams.get('page');
                    fetchResults(searchInput.value, page);
                });
            });
        }

        // Input listener
        searchInput.addEventListener('input', () => {
            fetchResults(searchInput.value);
        });

        // Initial fetch
        fetchResults();
    });
</script>

</x-admin-layout>
