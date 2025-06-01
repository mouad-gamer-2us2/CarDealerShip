<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Car;
use App\Models\User;
use Livewire\Component;

class DashboardStats extends Component
{
    public $tab = 'users';

    public function setTab($tab)
    {
        $this->tab = $tab;
        $this->dispatchCharts();
    }

    public function mount()
    {
        $this->dispatchCharts();
    }

    private function dispatchCharts()
    {
        $brands = Brand::withCount('cars')->get()->map(fn($b) => [
            'name' => $b->brand_name,
            'count' => $b->cars_count
        ]);

        $prices = Car::pluck('price')->toArray();

        $this->dispatch('renderCharts', [
            'usersCount' => User::count(),
            'brands' => $brands,
            'prices' => $prices,
        ]);
    }

    public function render()
    {
        $usersCount = User::count();
        $totalCars = Car::count();
        $avgPrice = Car::avg('price');

        $mostSoldBrand = Brand::withCount([
            'cars as sold_count' => fn ($q) => $q->whereNotNull('bought_by')
        ])->orderByDesc('sold_count')->first();

        return view('livewire.dashboard-stats', compact(
            'usersCount',
            'totalCars',
            'avgPrice',
            'mostSoldBrand'
        ));
    }
}
