<x-admin-layout title="Sell Car">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-info text-white text-center fw-bold">
                        Sell Car to a Buyer
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cars.sell', $car->car_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label">Search Buyer by Name or Email</label>
                                <input type="text" class="form-control form-control-lg" id="user-search" placeholder="Start typing..." autocomplete="off">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Select Buyer</label>
                                <select name="buyer_id" class="form-select form-select-lg" id="user-select" required>
                                    <option disabled selected>Search for a user above</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-check2-circle me-1"></i> Confirm Sale
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('cars.show', $car->car_id) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Back to Car Details
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('user-search');
            const userSelect = document.getElementById('user-select');

            searchInput.addEventListener('input', function () {
                const query = this.value.trim();
                if (query.length < 2) return;

                fetch(`/api/users/search?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        userSelect.innerHTML = '';
                        if (data.length === 0) {
                            userSelect.innerHTML = '<option disabled>No buyers found</option>';
                        } else {
                            const defaultOption = document.createElement('option');
                            defaultOption.disabled = true;
                            defaultOption.selected = true;
                            defaultOption.text = 'Select a buyer';
                            userSelect.appendChild(defaultOption);

                            data.forEach(user => {
                                const option = document.createElement('option');
                                option.value = user.id;
                                option.text = `${user.name} (${user.email})`;
                                userSelect.appendChild(option);
                            });
                        }
                    });
            });
        });
    </script>
</x-admin-layout>
