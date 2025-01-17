<div>
    <form wire:submit.prevent="placeOrder">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="checkout-left">
                    <h3 class="form-header fs-1">Billing & Shipping Details</h3>
                    <form action="mail.php">
                        <div class="checkout-form-wrap">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <h4 class="form-title fs-4 mt-3 mb-3">Email Address*</h4>
                                        <input type="email" wire:model.live="email" class="form-control p-4 fs-4"
                                            value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-item name">
                                        <h4 class="form-title fs-3 mt-4 mb-4">First Name*</h4>
                                        <input type="text" wire:model.live="first_name" class="form-control p-4 fs-4"
                                            value="{{ old('first_name', auth()->check() ? auth()->user()->first_name : '') }}">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <h4 class="form-title fs-3 mt-4 mb-4">Last Name*</h4>
                                        <input type="text" wire:model.live="last_name" class="form-control p-4 fs-4"
                                            value="{{ old('last_name', auth()->check() ? auth()->user()->last_name : '') }}">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <h4 class="form-title fs-3 mt-4 mb-4">Company Name (Optional)*</h4>
                                        <input type="text" wire:model.live="company_name" class="form-control fs-4 p-4"
                                            value="{{ old('company_name') }}">
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <h4 class="form-title fs-3 mt-4 mb-4">Country / Region*</h4>
                                        <input type="text" wire:model.live="country" class="form-control fs-4 p-4"
                                            placeholder="United States (US)" value="{{ old('country') }}">
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item ">
                                        <h4 class="form-title fs-4 mt-4 mb-4">Street Address*</h4>
                                        <input type="text" wire:model.live="street1"
                                            class="form-control street-control fs-4 p-4"
                                            placeholder="House number and street number" value="{{ old('street1') }}">
                                        @error('street1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="text" wire:model.live="street2"
                                            class="form-control street-control-2 fs-4 p-4 mt-4 mb-4"
                                            placeholder="Apartment, suite, unit, etc. (optional)"
                                            value="{{ old('street2') }}">
                                        @error('street2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <h4 class="form-title fs-4 mt-4 mb-4">Town / City*</h4>
                                        <input type="text" wire:model.live="city" class="form-control fs-4 p-4"
                                            value="{{ old('city') }}">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <h4 class="form-title mt-4 mb-4 fs-4">State*</h4>
                                        <input type="text" wire:model.live="state" class="form-control fs-4 p-4"
                                            value="{{ old('state') }}">
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <h4 class="form-title mt-4 mb-4 fs-4">Zip Code*</h4>
                                        <input type="text" wire:model.live="zip_code" class="form-control p-4"
                                            value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-item">
                                        <h4 class="form-title fs-4 mt-4 mb-4">Phone*</h4>
                                        <input type="text" wire:model.live="phone" class="form-control  p-4"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-item">
                                        <h4 class="form-title mt-4 mb-4 fs-4">Order Notes*</h4>
                                        <textarea wire:model.live="notes" cols="30" rows="5"
                                            class="form-control address fs-4 " value="{{ old('notes') }}"></textarea>
                                        @error('notes')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 ">
                <div class="checkout-right">
                    <h3 class="form-header mt-4 mb-4">Your Order</h3>
                    <div class="order-box">
                        <div class="order-items">
                            <div class="order-item item-1 d-flex justify-content-between">
                                <div class="order-left">
                                    <span class="product fs-2 text-muted fw-bold">PRODUCT</span>
                                </div>
                                <div class="order-right">
                                    <span class="price fs-2 text-muted fw-bold">PRICE</span>
                                </div>
                            </div>
                            @foreach ($cart->items as $item)
                                <div class="order-item d-flex align-items-start mb-4 mt-4">
                                    <!-- Image Section -->
                                    <div class="order-img me-3">
                                        <img src="{{ Storage::url($item->product->images->first()->image) }}" alt="img"
                                            class="img-fluid rounded" style="height: 60px; width: 100px;">
                                    </div>

                                    <!-- Content Section -->
                                    <div class="order-content w-100">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="category text-uppercase text-danger d-block mb-1"
                                                    style="font-size: 12px;">
                                                    {{ $item->product->categories->first()->name }}
                                                </span>
                                                <h4 class="title mb-0" style="font-size: 16px; font-weight: bold;">
                                                    {{ $item->product->name }}
                                                </h4>
                                            </div>
                                            <div class="text-end">
                                                <span class="fs-4 text-muted">Qty: x{{ $item->quantity }}</span>
                                                <span class="price text-muted"
                                                    style="font-size: 16px; font-weight: bold;">{{ Number::currency($item->total) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            <div class="order-item item-1 d-flex justify-content-between align-items-center mb-3">
                                <!-- Left Section -->
                                <div class="order-left">
                                    <span class="left-title" style="font-size: 16px; font-weight: 500;">Subtotal</span>
                                </div>

                                <!-- Right Section -->
                                <div class="order-right text-end">
                                    <span class="right-title"
                                        style="font-size: 16px; font-weight: bold;">{{ Number::currency($getSubtotal) }}</span>
                                </div>
                            </div>

                            <div class="order-item item-1 d-flex justify-content-between">
                                <div class="order-left">
                                    <span class="left-title">Shipping</span>
                                </div>
                                <div class="order-right d-flex flex-column">
                                    <div class="form-group">
                                        {{-- pickup or warehouse checkboxes --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" wire:model.live="shippingMethod" value="pickup">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Pickup
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" wire:model.live="shippingMethod"
                                                value="warehouse">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Nearest Warehouse
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-item item-1 d-flex justify-content-between">
                                <div class="order-left">
                                    <span class="left-title">Total Price:</span>
                                </div>
                                <div class="order-right">
                                    <span class="right-title title-2">{{ Number::currency($total) }}</span>
                                </div>
                            </div>

                        </div>
                        <div class="payment-option-wrap">
                            <div class="payment-option">
                                <div class="accordion-item">
                                    <h2 class="accordion-header bg-white p-3 mt-4 mb-4" id="upperpay">
                                        <button class="accordion-button collapsed p-3 fs-3" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseupperpay"
                                            aria-expanded="false" aria-controls="collapseupperpay">
                                            Pay {{ Number::currency($total) }} with Uber Pay
                                        </button>
                                    </h2>
                                    <div id="collapseupperpay" class="accordion-collapse collapse show"
                                        aria-labelledby="headingupperpay" data-bs-parent="#accordionExampleTwo">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-item name mt-4 mb-4">
                                                        <h5 class="form-title mt-3 fs-4 mb-4">Card Holder Name</h5>
                                                        <input type="text" id="card_holder_name" name="card_holder_name"
                                                            class="form-control fs-4 p-4">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-item name">
                                                        <h5 class="form-title mt-3 mb-4 fs-3">Card Number</h5>
                                                        <input type="text" id="card_number" name="card_number"
                                                            class="form-control fs-4 p-4">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-item name">
                                                        <h5 class="form-title mt-3 mb-4 fs-3">Expiration Date</h5>
                                                        <input type="text" id="expiery_date" name="expiery_date"
                                                            class="form-control fs-4 p-4">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-item name">
                                                        <h5 class="form-title mt-3 mb-4 fs-3">CVV</h5>
                                                        <input type="text" id="cvv" name="cvv"
                                                            class="form-control fs-4 p-4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="desc mt-3 mb-4 ms-2">Your personal data will be used to process your order,
                                support your
                                experience throughout this website, and for other purposes described in our
                                <span>privacy policy.</span>
                            </p>
                            <div class="form-check">
                                <input class="form-check-input fs-4" type="checkbox" value="" id="flexCheckDefault"
                                    required>
                                <label class="form-check-label fs-4" for="flexCheckDefault">
                                    I have read and agree terms and conditions *
                                </label>
                            </div>
                            <button class="btn btn-light w-100 p-4 text-white mt-4"
                                style="background-color:rgb(141, 62, 102);">Place Your Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>