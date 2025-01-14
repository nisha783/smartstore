<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(
        protected CartService $cartService
    ) {}

    public function index()
    {
        $cart = $this->cartService->getCart();

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = $this->cartService->addToCart($product, $request->qty);

        return back()->with('success', 'Product added to cart successfully');
    }

    public function update(Request $request, Product $product)
    {
        $cart = $this->cartService->updateQuantity($product, $request->quantity);

        return response()->json([
            'message' => 'Cart updated successfully',
            'cart' => $cart,
            'cart_count' => $this->cartService->getCartItemsCount(),
        ]);
    }

    public function remove(Product $product)
    {
        $cart = $this->cartService->removeFromCart($product);

        return response()->json([
            'message' => 'Product removed from cart successfully',
            'cart' => $cart,
            'cart_count' => $this->cartService->getCartItemsCount(),
        ]);
    }

    public function clear()
    {
        $this->cartService->clearCart();

        return response()->json([
            'message' => 'Cart cleared successfully',
            'cart_count' => 0,
        ]);
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
