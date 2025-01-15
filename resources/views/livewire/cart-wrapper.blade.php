<li>
    <a href="{{ route('cart.index') }}" class="icon">
        <i class="fa-light fa-bag-shopping"></i>
        <span>{{ $getCartItemsCount }}</span>
    </a>
    <div class="content">
        <span>Your cart,</span>
        <h5 class="number">{{ Number::currency($getCartTotal) }}</h5>
    </div>
</li>