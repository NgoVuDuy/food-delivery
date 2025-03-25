<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use Livewire\Attributes\Layout;

// #[Layout("components.layouts.staff")]
class OrderManagement extends Component
{
    public function mount() {

        dd("ay da");
    }
    public function render()
    {
        return view('livewire.staff.order-management');
    }
}
