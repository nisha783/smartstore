<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Component;

class Cart extends Component
{

    public $cart;
    public $quantities = [];

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        $this->cart = $this->cartService->getCart();

        // Initialize quantities array with current cart item quantities
        foreach ($this->cart->items as $item) {
            $this->quantities[$item->product_id] = $item->quantity;
        }
    }

    public function updateQuantity($productId, $quantity)
    {
        if ($quantity < 1) {
            $quantity = 1;
        }

        $product = \App\Models\Product::find($productId);

        // Check if we have enough stock
        if ($product->stock < $quantity) {
            $this->dispatch('notify', [
                'message' => 'Not enough stock available',
                'type' => 'error'
            ]);
            return;
        }

        $this->cart = $this->cartService->updateQuantity($product, $quantity);

        $this->dispatch('cart-updated', [
            'count' => $this->cartService->getCartItemsCount()
        ]);
    }

    public function removeItem($productId)
    {
        $product = \App\Models\Product::find($productId);
        $this->cart = $this->cartService->removeFromCart($product);

        $this->dispatch('cart-updated', [
            'count' => $this->cartService->getCartItemsCount()
        ]);

        $this->dispatch('notify', [
            'message' => 'Item removed from cart',
            'type' => 'success'
        ]);
    }

    public function clearCart()
    {
        $this->cart = $this->cartService->clearCart();

        $this->dispatch('cart-updated', [
            'count' => 0
        ]);

        $this->dispatch('notify', [
            'message' => 'Cart cleared successfully',
            'type' => 'success'
        ]);
    }

    #[On('cart-updated')]
    public function updateCart()
    {
        $this->cart = $this->cartService->getCart();
    }

    public function render()
    {
        return view('livewire.cart', [
            'subtotal' => $this->cart->total_amount,
            'total' => $this->cart->total_amount, // Add tax/shipping calculation if needed
        ]);
    }
}
