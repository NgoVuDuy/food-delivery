<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;


#[Title('Cửa hàng')]
class StoreLocation extends Component
{

    public $store_locations = [];

    public $des_lat;
    public $des_lng;
    public $current_lat;
    public $current_lng;
    public $points;

    public function mount() {

        $this->store_locations = Http::get(Component::$url . 'store-locations')->json();

    }

    #[On('show_direction')]
    public function show_direction() {

        $this->points = Http::get(Component::$url . 'directions', [
            'origin' => $this->current_lat . ',' . $this->current_lng,
            'destination' => $this->des_lat . ',' . $this->des_lng,
            'vehicle' => 'car',

        ])->json();

        $this->dispatch('updated-points');
    }
    
    public function render()
    {
        return view('livewire.store-locations');
    }
}
