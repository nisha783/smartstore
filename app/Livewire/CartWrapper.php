<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\On;

class CartWrapper extends Component
{
    public $getCartItemsCount;
    public $getCartTotal;

    public function mount()
    {
        $cartService = new CartService();
        $this->getCartItemsCount = $cartService->getCartItemsCount();
        $this->getCartTotal = $cartService->getSubtotal();
    }

    #[On('cart-updated')]
    public function updateCart() {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.cart-wrapper');
    }
}
