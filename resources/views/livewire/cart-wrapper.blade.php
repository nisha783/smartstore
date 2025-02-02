<div class="header-cart">
                            <a href="{{route('cart.index')}}"
                                class="cart-item text-decoration-none text-dark position-relative">
                                <!-- Icon container with position-relative -->
                                <span class="position-relative">
                                    <!-- Shopping Cart Icon (Trali Icon) -->
                                    <i class="bi bi-cart-fill fs-2 text-muted" style="font-size: 1.5rem;"></i>

                                    <!-- Cart Count Badge -->
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill  "
                                        style="background-color:rgb(141, 62, 102);">
                                        {{ $getCartItemsCount }} 
                                        <span class="visually-hidden">cart items</span>
                                    </span>
                                </span>

                                <!-- Cart Text -->
                                <span class="cart-text ms-2">Cart</span>
                            </a>
                            <div class="cart-submenu">
                                <div class="cart-wrapper-item">
                                    <!-- Cart item details -->
                                    <div class="wrapper">
                                        <div class="wrapper-item">
                                            <div class="wrapper-img">
                                                <img src="assets/images/homepage-one/product-img/product-img-1.webp"
                                                    alt="img">
                                            </div>
                                            <div class="wrapper-content">
                                                <h5 class="wrapper-title">Classic Design Skart</h5>
                                                <div class="price">
                                                    <p class="new-price">$20.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Close button -->
                                        <span class="close-btn">
                                            <svg viewBox="0 0 10 10" fill="none" class="fill-current"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                    <!-- More items... -->
                                </div>
                                <div class="cart-wrapper-section">
                                    <div class="wrapper-line"></div>
                                    <div class="wrapper-subtotal">
                                        <h5 class="wrapper-title">Subtotal</h5>
                                        <h5 class="wrapper-title">$60</h5>
                                    </div>
                                    <div class="cart-btn">
                                        <a href="{{route('cart.index')}}" class="shop-btn view-btn">View Cart</a>
                                        <a href="{{route('checkout.index')}}" class="shop-btn checkout-btn">Checkout
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>