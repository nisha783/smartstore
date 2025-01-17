<div>
    <form wire:submit="addToCart" method="POST">
        @csrf
        <div class="product-btn">
            <input type="number" wire:model.live="qty" min="1" max="5000" step="1"
                class="form-control @error('qty') is-invalid @enderror">

            @error('qty')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <div class="cart-btn-wrap-2">
                <button type="submit" class="rr-primary-btn cart-btn" wire:loading.attr="disabled"
                    wire:target="addToCart">
                    <span wire:loading.remove wire:target="addToCart">
                        Add To Cart
                    </span>
                    <span wire:loading wire:target="addToCart">
                        Adding...
                    </span>
                </button>
            </div>
        </div>
    </form>
    <a href="javascript:void(0);" wire:click="buyNow()" class="shop-details-btn rr-primary-btn">
        <span wire:loading.remove wire:target="addToCart">
            Buy The Item Now
        </span>
        <span wire:loading wire:target="addToCart">
            Loading...
        </span>
    </a>
</div>
