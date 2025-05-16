<x-admin-layout title="Buyer Users">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-uppercase">List of Buyers</h2>
            <p class="text-muted">Search by name or email to find a buyer quickly.</p>
        </div>

        <!-- Search Bar -->
        <div class="input-group mb-4 shadow-sm">
            <span class="input-group-text bg-dark text-white"><i class="bi bi-search"></i></span>
            <input type="text" id="search-buyer" class="form-control form-control-lg" placeholder="Search buyers..." autocomplete="off">
        </div>

        <!-- Results Area -->
        <div id="buyer-results">
            @include('partials.buyer.buyer_results', ['buyers' => $buyers])
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

        // SweetAlert Delete Confirmation
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-delete-user')) {
                e.preventDefault();
                const form = e.target.closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This user will be permanently deleted!",
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
    </script>

    <script>
    document.addEventListener('click', function (e) {
        if (e.target.closest('.btn-delete-user')) {
            e.preventDefault();
            const form = e.target.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This buyer will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });
</script>

</x-admin-layout>
