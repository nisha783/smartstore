<!--------------- blog-tittle-section---------------->
<div>
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Cart</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Cart</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- cart-section---------------->
    <section class="product-cart product footer-padding">
        <div class="container">
            <div class="cart-section">
                <div class="row">
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr class="table-row table-top-row">
                                <td class="table-wrapper wrapper-product">
                                        <h5 class="table-heading">CLEAR</h5>
                                    </td>
                                    <td class="table-wrapper wrapper-product">
                                        <h5 class="table-heading">PRODUCT</h5>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">PRICE</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">QUANTITY</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper"> 
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">Subtotal</h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row ticket-row">
                                    @forelse ($cart->items as $item)
                                    <tr wire:key="cart-item-{{ $item->id }}">
                                    <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <button wire:click="removeItem({{ $item->product_id }})"
                                                        wire:loading.attr="disabled" class="btn btn-close ms-3">
                                                        <i class="fa-sharp fa-regular fa-xmark"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="table-wrapper wrapper-product">
                                                <div class="wrapper">
                                                    <div class="wrapper-img">
                                                        <a href="">
                                                            <img src="{{ Storage::url($item->product->images->first()->image) }}"
                                                                alt="{{ $item->product->name }}" class="product-image m-4"
                                                                height="50px">
                                                        </a>
                                                    </div>
                
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading fs-3">{{ Number::currency($item->price) }}</h5>
                                                </div>
                                            </td>
                                            <td class="table-wrapper">
                                                <div class="table-wrapper-center">
                                                    <div class="quantity">
                                                        <input type="number"
                                            wire:model.live.debounce.500ms="quantities.{{ $item->product_id }}"
                                            wire:change="updateQuantity({{ $item->product_id }}, $event.target.value)"
                                            class="input-text qty text" min="1" max="{{ $item->product->stock }}"
                                            step="1">
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="table-wrapper wrapper-total">
                                                <div class="table-wrapper-center">
                                                    <h5 class="heading fs-3">{{ Number::currency($item->total) }}</h5>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                Your cart is empty.
                                                <a href="{{ route('index') }}" class="btn btn-link">Continue Shopping</a>
                                            </td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        @if ($cart->items->isNotEmpty())
                <div class="cart-actions mt-4">
                    <button wire:click="clearCart" wire:loading.attr="disabled" class="btn btn-outline-danger fs-3">
                        Clear Cart
                    </button>
                </div>
            @endif
                    </div>


                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="fs-2">Cart Totals</h5>
                                <hr>
                                <div class="wishlist-btn cart-btn d-flex justify-content-between align-items-center">
                                    <h5 class="title fs-2">Subtotal</h5>
                                    <p class="price">{{ Number::currency($subtotal) }}</p>
                                </div>
                                <hr>

                                <div
                                    class="checkout-total checkout-item d-flex justify-content-between align-items-center mt-2">
                                    <h5 class="title fs-2 ">Total</h5>
                                    <span>{{ Number::currency($total) }}</span>
                                </div>

                                @if ($cart->items->isNotEmpty())
                                    <a href="{{ route('checkout.index') }}"
                                        class="shop-btn btn btn-primary mt-3 w-100">Proceed to Checkout</a>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>