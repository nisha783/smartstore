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

<section class="checkout-section pb-100">
        <div class="container">
            @guest
                <div class="row">
                    <div class="col-md-6">
                        @include('inc.register-form')
                    </div>
                    <div class="col-md-6">
                        @include('inc.login-form')
                    </div>
                </div>
            @endguest
            @auth
                @livewire('checkout-form')
            @endauth
        </div>
    </section>
@endsection