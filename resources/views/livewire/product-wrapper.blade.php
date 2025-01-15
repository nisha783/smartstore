<div class="shop-item">
    <div class="shop-thumb">
        <div class="overlay"></div>
        @if ($product->images->count())
            <img src="{{ Storage::url($product->images->first()->image) }}" alt="shop">
        @endif
        @if ($product->sale_price)
            <span class="sale">Sale</span>
        @endif
        <ul class="shop-list">
            <li><a href="javascript:void(0)" wire:click="addToCart({{ $product->id }})"><i
                        class="fa-regular fa-cart-shopping"></i></a></li>
            <li><a href="javascript:void(0)" wire:click="addToWishlist({{ $product->id }})"><i class="fa-light fa-heart"></i></a></li>
            <li><a href="#"><i class="fa-light fa-eye"></i></a></li>
        </ul>
    </div>
    <div class="shop-content">
        <div class="d-flex flex-wrap">
            @forelse ($product->categories as $category)
                <a href="{{ route('category.show', $category->slug) }}">
                    <span class="category badge badge-secondary">{{ $category->name }}</span>
                </a>
            @empty
                <span class="category">{{ 'Uncategorized' }}</span>
            @endforelse
        </div>
        <h3 class="title"><a href="{{ route('product.show', ['product' => $product->slug]) }}">{{ $product->name }}</a>
        </h3>
        <div class="review-wrap">
            <ul class="review">
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
            </ul>
            <span>({{ $product->reviews()->count() }} Reviews)</span>
        </div>
        <span class="price">
            @if ($product->sale_price)
                <span class="offer">{{ Number::currency($product->price) }}</span>
                {{ Number::currency($product->sale_price) }}
            @else
                {{ Number::currency($product->price) }}
            @endif
        </span>
    </div>
</div>
