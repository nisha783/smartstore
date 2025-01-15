<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class ProductWrapper extends Component
{
    public $product;

    public function addToCart(Product $product)
    {
        // Instantiate the CartService where it's needed
        $cartService = new CartService();

        // Add the product to the cart
        $cartService->addToCart($product, 1);

        $this->dispatch('cart-updated');

        // Dispatch a success message
        $this->dispatch('success', 'Product added to cart successfully');
    }

    public function addToWishlist(Product $product)
    {
        $product->addToWishlist($product->id);

        $this->dispatch('success', 'Product added to wishlist successfully');
    }

    public function render()
    {
        return view('livewire.product-wrapper');
    }
}
