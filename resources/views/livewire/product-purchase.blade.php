<div class="mt-3">
    <!-- Quantity Input and Add to Cart aligned horizontally -->
    <div class="d-flex align-items-center gap-3 mb-3">
        <!-- Quantity Input -->
        <div class="flex-grow-1">
            <input type="number" wire:model.live="qty" min="1" max="5000" step="1"class="p-3"
                class="form-control @error('qty') is-invalid @enderror text-center"
                placeholder="1">
            @error('qty')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Add to Cart Button -->
        <div>
            <form wire:submit="addToCart" method="POST">
                @csrf
                <button type="submit" class=" p-3 text-white w-100"      style="background-color:rgb(206, 70, 176);"   wire:loading.attr="disabled" wire:target="addToCart">
                    <span wire:loading.remove wire:target="addToCart">Add To Cart</span>
                    <span wire:loading wire:target="addToCart">Adding...</span>
                </button>
            </form>
        </div>  
    </div>

    <!-- Buy Now Button -->
    <div class="mt-3">
    <a href="javascript:void(0);" wire:click="buyNow()" class="btn btn-purple w-100  text-white p-3"     style="background-color:rgb(206, 70, 176);">
    <span wire:loading.remove wire:target="addToCart">Buy The Item Now</span>
    <span wire:loading wire:target="addToCart">Loading...</span>
</a>

    </div>
</div>
