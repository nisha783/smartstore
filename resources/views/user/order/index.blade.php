@extends('layouts.app')
@section('content')
<section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Order</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Order</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

 <!-- Order Section -->
<section class="order product footer-padding">
    <div class="container">
        <div class="order-title">
            <h5 class="wrapper-heading">Track Your Order</h5>
            <p class="paragraph">Enter your order tracking number and your secret ID.</p>
            <div class="order-section">
                <div class="row gy-5">
                    <div class="col-lg-8">
                        <div class="login-section">
                            <div class="review-form">
                                <div class="review-inner-form ">
                                    <div class="review-form-name">
                                        <label for="track-number" class="form-label">Order Tracking Number**</label>
                                        <input type="number" id="track-number" class="form-control" placeholder="Order Number">
                                    </div>
                                    <div class="review-form-name">
                                        <label for="Delivery" class="form-label">Delivery Date*</label>
                                        <input type="date" id="Delivery" class="form-control">
                                    </div>
                                </div>
                                <a href="#" class="shop-btn">Track Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-img text-center" data-aos="fade-right" data-aos-duration="1000">
                            <img src="./assets/images/homepage-one/order.png" alt="order">
                        </div>
                    </div>
                </div>
                
                <!-- Dynamic Orders Section -->
                <div class="order-history">
                    <h5 class="order-history-title">Your Orders</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(auth()->user()->orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->tracking_number }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}" class="shop-btn">View Order</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">You have no orders.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection