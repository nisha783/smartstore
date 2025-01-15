@extends('layouts.app')
@section('content')
<section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Checkout</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- checkout-section---------------->
    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <div class="row gy-5">
                    <div class="col-lg-6">
                        <div class="checkout-wrapper">
                            <a href="{{route('login')}}" class="shop-btn">Log into Your Account</a>
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Billing Details</h5>
                                <form action="{{ route('checkout.store') }}" method="POST">
    @csrf
    <div class="review-form">
        <div class="account-inner-form">
            <div class="review-form-name">
                <label for="fname" class="form-label">First Name*</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="{{ old('fname') }}">
                @error('fname') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="review-form-name">
                <label for="lname" class="form-label">Last Name*</label>
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="{{ old('lname') }}">
                @error('lname') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="account-inner-form">
            <div class="review-form-name">
                <label for="email" class="form-label">Email*</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" value="{{ old('email') }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="review-form-name">
                <label for="phone" class="form-label">Phone*</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="+880388**0899" value="{{ old('phone') }}">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="review-form-name">
            <label for="country" class="form-label">Country*</label>
            <select id="country" name="country" class="form-select">
                <option value="">Choose...</option>
                <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
            </select>
            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="review-form-name address-form">
            <label for="address" class="form-label">Address*</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Enter your Address" value="{{ old('address') }}">
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="account-inner-form city-inner-form">
            <div class="review-form-name">
                <label for="city" class="form-label">Town / City*</label>
                <select id="city" name="city" class="form-select">
                    <option value="">Choose...</option>
                    <option value="Newyork" {{ old('city') == 'Newyork' ? 'selected' : '' }}>Newyork</option>
                    <option value="Dhaka" {{ old('city') == 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                    <option value="London" {{ old('city') == 'London' ? 'selected' : '' }}>London</option>
                </select>
                @error('city') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="review-form-name">
                <label for="number" class="form-label">Postcode / ZIP*</label>
                <input type="number" id="number" name="number" class="form-control" placeholder="0000" value="{{ old('number') }}">
                @error('number') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="review-form-name checkbox">
            <div class="checkbox-item">
                <input type="checkbox" id="account" name="create_account" {{ old('create_account') ? 'checked' : '' }}>
                <label for="account" class="form-label">Create an account?</label>
            </div>
        </div>
        <div class="review-form-name shipping">
            <h5 class="wrapper-heading">Shipping Address</h5>
            <div class="checkbox-item">
                <input type="checkbox" id="remember" name="shipping_address" {{ old('shipping_address') ? 'checked' : '' }}>
                <label for="remember" class="form-label">Use different shipping address?</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-wrapper">
                            <a href="#" class="shop-btn">Enter Coupon Code</a>
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Order Summary</h5>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">PRODUCT</h5>
                                        <h5 class="wrapper-heading">PRICE</h5>
                                        
                                    </div>
                                    <hr>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach ($cart->items as $item)
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            <li>
                                                <div class="product-info">
                                                <img src="{{ Storage::url($item->product->images->first()->image) }}"
                                                alt="img" height="250px" width="800px">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-info">
                                                <span    class="category">{{ $item->product->categories->first()->name }}</span>
                                                    <h4 class="title">{{ $item->product->name }}</h4>
                                                </div>
                                                <div class="text-end">
                                                    <span class="">Qty: x{{ $item->quantity }}</span>
                                                    <br>
                                                    <span class="price">{{ Number::currency($item->total) }}</span>
                                                </div>
                                                @php
                                            $subtotal += $item->total;
                                        @endphp
                                    @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">SUBTOTAL</h5>
                                        <h class="wrapper-heading">{{ Number::currency($subtotal) }}</h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            <li>
                                                <div class="product-info">
                                                    <p class="paragraph">SHIPPING</p>
                                                    <h5 class="wrapper-heading">Free Shipping</h5>

                                                </div>
                                                <div class="price">
                                                    <h5 class="wrapper-heading">+$0</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="subtotal total">
                                        <h5 class="wrapper-heading">TOTAL</h5>
                                        <h5 class="wrapper-heading price">$365</h5>
                                    </div>
                                    <div class="subtotal payment-type">
                                        <div class="checkbox-item">
                                            <input type="radio" id="bank" name="bank">
                                            <div class="bank">
                                                <h5 class="wrapper-heading">Direct Bank Transfer</h5>
                                                <p class="paragraph">Make your payment directly into our bank account.
                                                    Please use
                                                    <span class="inner-text">
                                                        your Order ID as the payment reference.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" id="cash" name="bank">
                                            <div class="cash">
                                                <h5 class="wrapper-heading">Cash on Delivery</h5>
                                            </div>
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" id="credit" name="bank">
                                            <div class="credit">
                                                <h5 class="wrapper-heading">Credit/Debit Cards or Paypal</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Place Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection