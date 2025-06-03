<x-user-layout title="Payment Simulator">
    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Car Payment Simulator</h2>

        <div class="card shadow p-4">
            <div class="mb-3">
                <label for="price" class="form-label">Car Price ($)</label>
                <input type="number" id="price" class="form-control" placeholder="Enter car price">
            </div>

            <div class="mb-3">
                <label for="months" class="form-label">Payment Duration (Months)</label>
                <select id="months" class="form-select">
                    @foreach ([6, 12, 18, 24, 36, 48, 60] as $m)
                        <option value="{{ $m }}">{{ $m }} months</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="down" class="form-label">Down Payment (%)</label>
                <input type="range" id="down" class="form-range" min="0" max="50" step="1" value="10">
                <span id="downDisplay">10%</span>
            </div>

            <hr>

            <h5>Simulation Results:</h5>
            <ul class="list-group">
                <li class="list-group-item">Down Payment Amount: $<span id="downAmount">0.00</span></li>
                <li class="list-group-item">Monthly Payment: $<span id="monthly">0.00</span></li>
            </ul>
        </div>
    </div>

    <script>
        const priceInput = document.getElementById('price');
        const monthsInput = document.getElementById('months');
        const downInput = document.getElementById('down');
        const downDisplay = document.getElementById('downDisplay');
        const downAmount = document.getElementById('downAmount');
        const monthly = document.getElementById('monthly');

        function calculate() {
            const price = parseFloat(priceInput.value) || 0;
            const months = parseInt(monthsInput.value) || 1;
            const downPercent = parseInt(downInput.value) || 0;

            downDisplay.textContent = `${downPercent}%`;

            const downPay = (price * downPercent) / 100;
            const remaining = price - downPay;
            const monthlyPayment = months > 0 ? remaining / months : 0;

            downAmount.textContent = downPay.toFixed(2);
            monthly.textContent = monthlyPayment.toFixed(2);
        }

        priceInput.addEventListener('input', calculate);
        monthsInput.addEventListener('change', calculate);
        downInput.addEventListener('input', calculate);
    </script>
</x-user-layout>
