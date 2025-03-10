<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Giỏ hàng')]
class Cart extends Component
{
    public $carts;
    public $default_price = [];
    public $default_quantity = [];
    public $total_item = [];
    public $total;
    public $isEmptyCart = false;

    public function mount()
    {

        $this->carts = Http::get(Component::$url . 'carts')->json();

        if (!empty($this->carts)) {

            foreach ($this->carts as $index => $cart) {

                $this->default_price[$index] = $cart["total"] / $cart["quantity"];
                $this->default_quantity[$index] = $cart["quantity"];
                $this->total_item[$index] = $cart["total"];
            }

            $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
        } else {

            $this->isEmptyCart = true;
        }
    }

    public function decrease(string $index)
    {

        if ($this->default_quantity[$index] > 1) {
            $this->default_quantity[$index]--;
        }

        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        $this->total_item[$index] = $this->carts[$index]["total"];
        $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
    }

    public function increase(string $index)
    {
        if ($this->default_quantity[$index] < 100) {
            $this->default_quantity[$index]++;
        }

        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        $this->total_item[$index] = $this->carts[$index]["total"];
        $this->total = number_format(array_sum(array_map(function ($item) {
            return str_replace('.', '', $item);
        }, $this->total_item)), 0, '.', '.');
    }

    public function updatedDefaultQuantity($value, $index)
    {

        $this->default_quantity[$index] = $value ?: 1;

        if ($this->default_quantity[$index] > 100) {
            $this->default_quantity[$index] = 100;
        }

        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        $this->total_item[$index] = $this->carts[$index]["total"];
        $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
    }

    public function delete_cart_item(string $cart_item_id)
    {

        $response = Http::delete(Component::$url . 'carts' . '/' . $cart_item_id);

        if ($response->successful()) {

            $this->dispatch('updateCountCart');

            foreach ($this->carts as $index => $cart) {

                if ($cart["id"] == $cart_item_id) {

                    unset($this->carts[$index]);

                    if (empty($this->carts)) {
                        $this->isEmptyCart = true;
                    } else {

                        unset($this->default_price[$index]);
                        unset($this->default_quantity[$index]);
                        unset($this->total_item[$index]);
                    }
                    break;
                }
            }

            if (!empty($this->carts)) {

                $this->carts = array_values($this->carts);
                $this->default_price = array_values($this->default_price);
                $this->default_quantity = array_values($this->default_quantity);
                $this->total_item = array_values($this->total_item);

                $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
            }
        } else {
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
