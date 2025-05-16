<x-admin-layout title="Car Listings">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase">Car Listings</h2>
            <p class="text-muted">Browse all available cars. Use the search to filter by model, engine, VIN, etc.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-dark text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="search" class="form-control form-control-lg" placeholder="Search by any field..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="car-results">
            @include('partials.car.available_results', ['cars' => $cars])
        </div>
    </div>

    <!-- AJAX Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search');
            const resultsContainer = document.getElementById('car-results');

            function fetchResults(term = '', page = 1) {
                fetch(`{{ route('cars.available.search') }}?term=${encodeURIComponent(term)}&page=${page}`)
                    .then(res => res.text())
                    .then(html => resultsContainer.innerHTML = html);
            }

            searchInput.addEventListener('input', () => {
                fetchResults(searchInput.value);
            });

            document.addEventListener('click', function (e) {
                const link = e.target.closest('.pagination a');
                if (link) {
                    e.preventDefault();
                    const url = new URL(link.href);
                    const page = url.searchParams.get('page');
                    fetchResults(searchInput.value, page);
                }
            });

            fetchResults(); // initial load
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('click', function (e) {
            const deleteButton = e.target.closest('.btn-delete-car');
            if (deleteButton) {
                e.preventDefault();
                const form = deleteButton.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This car will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    });
</script>

</x-admin-layout>
