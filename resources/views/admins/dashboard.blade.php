<x-admin-layout title="Dashboard">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Dashboard Overview</h2>

        {{-- Correct way to include component --}}
        @livewire('dashboard-stats')
    </div>
</x-admin-layout>
