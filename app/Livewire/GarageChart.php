<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Garage;

class GarageChart extends Component
{
    public $labels = [];
    public $data = [];

    public function mount()
    {
        $garages = Garage::withCount('vehicles')->get();

        $this->labels = $garages->pluck('name')->toArray();
        $this->data = $garages->pluck('vehicles_count')->toArray();
    }

    public function render()
    {
        return view('livewire.garage-chart');
    }
}