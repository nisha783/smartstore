<?php

use App\Models\Setting;
use App\Services\CartService;

function site_setting($key, $default = null)
{
    $setting = Setting::where('key', $key)->first();
    if ($setting) {
        return $setting->value;
    } else {
        if ($default === null) {
            return null;
        } else {
            return $default;
        }
    }
}

function cartItems()
{
    $cartService = new CartService();
    $cartitems = $cartService->getCart();

    return $cartitems;
}

function cartItemsCount()
{
    $cartService = new CartService();
    return $cartService->getCartItemsCount();
}
