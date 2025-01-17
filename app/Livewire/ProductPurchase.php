<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Component;

class ProductPurchase extends Component
{
    public $product;
    public $cartService;
    public $qty = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart(CartService $cartService)
    {

        $this->validate([
            'qty' => 'required|numeric|min:1|max:100'
        ]);

        try {
            // Use the injected cart service
            $cartService->addToCart($this->product, $this->qty);

            // Dispatch success message
            $this->dispatch('success', 'Product added to cart successfully');

            // Reset quantity if needed
            $this->qty = 1;
        } catch (\Exception $e) {
            $this->dispatch('error', 'Failed to add product to cart.');
        }
    }


    public function updating($name, $value)
    {
        // Validate quantity when it's being updated
        if ($name === 'qty') {
            if (!is_numeric($value) || $value < 1 || $value > 100) {
                $this->qty = 1;
            }
        }
    }

    public function buyNow(CartService $cartService)
    {
        $cartService = new CartService();
        $cartService->addToCart($this->product, 1);
        return redirect()->route('checkout.index');
    }

    public function render()
    {
        $this->dispatch('cart-updated');
        return view('livewire.product-purchase');
    }
}
