<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserAddress;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = $this->cartService->getCart();

        return view('checkout.index', compact('cart'));
    }

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
    public function store(Request $request)
    {
        // validation
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'street1' => ['required', 'string', 'max:255'],
            'street2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        // try {
        return DB::transaction(function () use ($request, $validated) {

            // if user not logged in, then create new account

            if (!auth()->check()) {
                $user = User::create([
                    'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    'password' => bcrypt('password'),
                ]);
                auth()->login($user);
            }



            // Get cart items and calculate totals
            $cartItems = $this->cartService->getItems();
            $subtotal = $this->cartService->getSubtotal();
            $tax = $this->calculateTax($subtotal);
            $discount = 0;
            $shippingCost = $this->calculateShippingCost();
            $total = $subtotal + $shippingCost + $tax - $discount;

            // Save address
            $userAddress = UserAddress::create([
                'user_id' => auth()->id(),
                'address_type' => 'shipping',
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'address_line1' => $validated['street1'],
                'address_line2' => $validated['street2'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'postal_code' => $validated['zip_code'],
                'country' => $validated['country'],
                'phone' => $validated['phone'],
                'is_default' => !UserAddress::where('user_id', auth()->id())
                    ->where('address_type', 'shipping')
                    ->exists(),
            ]);

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => 'default', // Update this based on your payment method handling
                'shipping_method' => 'standard', // Update this based on your shipping method handling
                'shipping_cost' => $shippingCost,
                'tax' => $tax,
                'discount' => $discount,
                'notes' => $validated['notes'],
                'shipping_address' => json_encode($this->formatAddress($validated)),
                'billing_address' => json_encode($this->formatAddress($validated)),
            ]);

            // Create order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id ?? null,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->price * $item->quantity,
                ]);
            }

            // Clear the cart
            $this->cartService->clearCart();

            // You might want to trigger some events here
            // event(new OrderCreated($order));

            return redirect()->route('index', $order)
                ->with('success', 'Order placed successfully');
        });
        // } catch (\Exception $e) {
        //     info($e->getMessage());
        //     return back()->with('error', 'Failed to place order. Please try again.');
        // }



        // clear cart
        $this->cartService->clearCart();

        return redirect('/')->with('success', 'Order placed successfully');
    }

    protected function formatAddress($validated)
    {
        return [
            'email' => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'company_name' => $validated['company_name'],
            'address_line1' => $validated['street1'],
            'address_line2' => $validated['street2'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'postal_code' => $validated['zip_code'],
            'country' => $validated['country'],
            'phone' => $validated['phone'],
        ];
    }

    protected function calculateShippingCost()
    {
        // Implement your shipping cost calculation logic here
        return 0.00; // Placeholder
    }

    protected function calculateTax($subtotal)
    {
        // Implement your tax calculation logic here
        return 0.00; // Placeholder
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
