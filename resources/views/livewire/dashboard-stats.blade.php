<div>
    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <button wire:click="setTab('users')" class="nav-link {{ $tab === 'users' ? 'active' : '' }}">
                Users
            </button>
        </li>
        <li class="nav-item">
            <button wire:click="setTab('prices')" class="nav-link {{ $tab === 'prices' ? 'active' : '' }}">
                Price Stats
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    @if ($tab === 'users')
        <div class="card shadow mb-3">
            <div class="card-body">
                <h5>Total Users</h5>
                <p class="display-6">{{ $usersCount }}</p>
                <canvas id="usersChart" height="100"></canvas>
            </div>
        </div>
    @elseif ($tab === 'prices')
        <div class="card shadow mb-3">
            <div class="card-body">
                <h5>Price Stats</h5>
                <p>Total Cars: {{ $totalCars }}</p>
                <p>Avg Price: ${{ number_format($avgPrice, 2) }}</p>
                <p>Top Selling Brand: {{ $mostSoldBrand->brand_name ?? 'N/A' }} ({{ $mostSoldBrand->sold_count ?? 0 }} sold)</p>
                <canvas id="priceChart" height="100"></canvas>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', () => {
        @this.on('renderCharts', (data) => {
            // Users Chart
            const usersCtx = document.getElementById('usersChart')?.getContext('2d');
            if (usersCtx) {
                new Chart(usersCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Users'],
                        datasets: [{
                            label: 'Users Count',
                            data: [data.usersCount],
                            backgroundColor: 'rgba(54, 162, 235, 0.6)'
                        }]
                    }
                });
            }

            // Price Chart
            const priceCtx = document.getElementById('priceChart')?.getContext('2d');
            if (priceCtx) {
                new Chart(priceCtx, {
                    type: 'line',
                    data: {
                        labels: data.prices.map((p, i) => `Car ${i + 1}`),
                        datasets: [{
                            label: 'Car Prices',
                            data: data.prices,
                            backgroundColor: 'rgba(255, 206, 86, 0.6)',
                            fill: false,
                            borderColor: 'rgba(255, 159, 64, 1)',
                            tension: 0.3
                        }]
                    }
                });
            }
        });
    });
</script>
@endpush
