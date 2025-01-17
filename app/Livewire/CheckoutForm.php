<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserAddress;
use App\Services\CartService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckoutForm extends Component
{
    public $cart;
    public $total = 0;
    public $getSubtotal = 0;
    public $shipping = 1;
    public $shippingMethod = 'warehouse';

    public $email;
    public $first_name;
    public $last_name;
    public $company_name;
    public $country;
    public $street1;
    public $street2;
    public $city;
    public $state;
    public $zip_code;
    public $phone;
    public $notes;
    public $card_number;
    public $expiry_month;
    public $expiry_year;
    public $cvv;

    public function mount()
    {
        $cartService = new CartService();
        $this->cart = $cartService->getCart();
        $this->getSubtotal = $cartService->getSubtotal();
        $this->total = $this->getSubtotal + $this->shipping;

        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->email = auth()->user()->email;
    }

    public function updatedshippingMethod()
    {
        if ($this->shippingMethod == 'pickup') {
            $this->shipping = site_setting('checkout_pickup_shipping', 0);
        } else {
            $this->shipping = site_setting('checkout_nearest_warehouse_shipping', 1);
        }
        $this->total = $this->getSubtotal + $this->shipping;
    }

    // validation
    public function rules()
    {
        return [
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
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        // charge card
        if (!$this->chargeCard()) {
            $this->dispatch('error', "Error charging card");
        }

        $cartService = new CartService();

        // adding order
        DB::transaction(function () use ($cartService) {

            // Get cart items and calculate totals
            $cartItems = $cartService->getItems();
            $subtotal = $cartService->getSubtotal();
            $tax = $this->calculateTax($subtotal);
            $discount = $this->calculateDiscount();
            $shippingCost = $this->calculateShippingCost();
            $total = $subtotal + $shippingCost + $tax - $discount;

            // Save address
            $userAddress = UserAddress::create([
                'user_id' => auth()->id(),
                'address_type' => 'shipping',
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'address_line1' => $this->street1,
                'address_line2' => $this->street2,
                'city' => $this->city,
                'state' => $this->state,
                'postal_code' => $this->zip_code,
                'country' => $this->country,
                'phone' => $this->phone,
                'is_default' => !UserAddress::where('user_id', auth()->id())
                    ->where('address_type', 'shipping')
                    ->exists(),
            ]);

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'proccessing',
                'payment_status' => 'paid',
                'payment_method' => 'uberpay',
                'shipping_method' => $this->shippingMethod,
                'card_details' => json_encode($this->cardDetails()),
                'shipping_cost' => $shippingCost,
                'tax' => $tax,
                'discount' => $discount,
                'notes' => $this->notes,
                'shipping_address' => json_encode($this->formatAddress()),
                'billing_address' => json_encode($this->formatAddress()),
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
            $cartService->clearCart();

            // You might want to trigger some events here
            // event(new OrderCreated($order));

            return redirect()->route('user.order.show', $order)
                ->with('success', 'Order placed successfully');
        });
    }

    protected function formatAddress()
    {
        return [
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company_name' => $this->company_name,
            'address_line1' => $this->street1,
            'address_line2' => $this->street2,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->zip_code,
            'country' => $this->country,
            'phone' => $this->phone,
        ];
    }

    protected function cardDetails()
    {
        return [
            'card_number' => "42424242424242",
            'expiry_month' => "12",
            'expiry_year' => "2026",
            'cvv' => "123",
        ];
    }

    protected function calculateTax()
    {
        // Implement your tax calculation logic here
        return 0.00; // Placeholder
    }

    protected function calculateDiscount()
    {
        // Implement your tax calculation logic here
        return 0.00; // Placeholder
    }

    protected function calculateShippingCost()
    {
        if ($this->shippingMethod == 'pickup') {
            return site_setting('checkout_pickup_shipping', 0);
        } else {
            return site_setting('checkout_nearest_warehouse_shipping', 1);
        }
    }

    public function chargeCard()
    {
        return true;
    }

    public function render()
    {
        return view('livewire.checkout-form');
    }
}
