<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    protected function getOrCreateCart()
    {
        $sessionId = Session::get('cart_session_id');

        if (!$sessionId) {
            $sessionId = Str::uuid();
            Session::put('cart_session_id', $sessionId);
        }

        $userId = auth()->id();

        $cart = Cart::firstOrCreate(
            [
                'session_id' => $sessionId,
                'status' => 'active',
            ],
            [
                'user_id' => $userId,
            ]
        );

        if ($userId && !$cart->user_id) {
            $cart->update(['user_id' => $userId]);
        }

        return $cart;
    }


    public function addToCart(Product $product, int $quantity = 1)
    {
        $cart = $this->getOrCreateCart();

        $cartItem = $cart->items()->firstOrNew([
            'product_id' => $product->id,
        ]);

        $cartItem->quantity = ($cartItem->exists ? $cartItem->quantity : 0) + $quantity;
        $cartItem->price = $product->price;
        $cartItem->total = $cartItem->price * $cartItem->quantity;
        $cartItem->save();

        $this->updateCartTotal($cart);
        info("Cart Added");

        return $cart->fresh();
    }

    public function updateQuantity(Product $product, int $quantity)
    {
        $cart = $this->getOrCreateCart();

        if ($quantity <= 0) {
            $cart->items()->where('product_id', $product->id)->delete();
        } else {
            $cartItem = $cart->items()->where('product_id', $product->id)->first();

            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $quantity,
                    'total' => $product->price * $quantity,
                ]);
            }
        }

        $this->updateCartTotal($cart);

        return $cart->fresh();
    }

    public function removeFromCart(Product $product)
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->where('product_id', $product->id)->delete();
        $this->updateCartTotal($cart);

        return $cart->fresh();
    }

    public function clearCart()
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->delete();
        $cart->update(['total_amount' => 0]);

        return $cart;
    }

    protected function updateCartTotal(Cart $cart)
    {
        $total = $cart->items()->sum('total');
        $cart->update(['total_amount' => $total]);
    }

    public function getCart()
    {
        return $this->getOrCreateCart()->load('items.product');
    }

    public function getCartItemsCount()
    {
        return $this->getOrCreateCart()->items()->sum('quantity');
    }

    public function getItems()
    {
        $cart = $this->getOrCreateCart();
        return $cart->items()->with('product')->get(); // Ensure eager loading of products
    }

    public function getSubtotal()
    {
        $cart = $this->getOrCreateCart();
        return $cart->items()->sum('total'); // Sum up the 'total' column in cart items
    }
}
