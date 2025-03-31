<div>
    <div class="container mt-5">

        <div class="row">
            <div class="col-12">
                <div class="nav-child mb-4">

                    <a href="/menu" wire:navigate>Menu</a>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        width="16px" height="16px" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>

                    <a href="{{ route('dish-details', $product['id']) }}" class="active"
                        wire:navigate>{{ $product['name'] }}</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-5 col-12 d-flex">

                <div class="dish-img-wrap">
                    <img src="{{ asset($product['image']) }}" alt="">
                </div>

            </div>
            <div class="col-lg-7 col-md-5 col-12 d-flex flex-column justify-content-between">

                <div class="dish-option-wrap bg-light">

                    {{-- @if(!empty($cartItems))
                        {{ $cartItems[3]["total"] }}
                    @endif --}}

                    <div class="dish-option-name">
                        {{ $product['name'] }}
                    </div>

                    <div class="dish-option-price">
                        {{ $product['price'] }}đ
                    </div>

                    <div class=" {{ $isPizza ? '' : 'd-none' }}">

                        <div class="dish-option-cover">

                            <div class="dish-option-title">
                                Chọn Size
                            </div>
                            @foreach ($options['size'] as $size)
                                <button class="size-btn"
                                    wire:click="size('{{ $size['id'] }}','{{ $size['name'] }}', '{{ $size['price_modifier'] }}')"
                                    wire:ignore>{{ $size['name'] }} <span> +
                                        {{ $size['price_modifier'] }}đ</span></button>
                            @endforeach

                        </div>

                        <div class="dish-option-cover">

                            <div class="dish-option-title">
                                Chọn Đế
                            </div>

                            @foreach ($options['base'] as $base)
                                <button class="base-btn" wire:click="base('{{ $base['id'] }}','{{ $base['name'] }}')"
                                    wire:ignore>{{ $base['name'] }}</button>
                            @endforeach

                        </div>

                        <div class="dish-option-cover">
                            <div class="dish-option-title">
                                Chọn Viền
                            </div>

                            @foreach ($options['border'] as $border)
                                <button class="border-btn"
                                    wire:click="border('{{ $border['id'] }}','{{ $border['name'] }}', {{ $border['price_modifier'] }})"
                                    wire:ignore>
                                    {{ $border['name'] }}<span> + {{ $border['price_modifier'] }}đ</span>
                                </button>
                            @endforeach

                        </div>

                    </div>
                </div>

                <div class="dish-btn-cover d-flex align-items-center justify-content-between mt-4 column-gap-4">

                    <div class="dish-btn-quantity">


                        <label for="quantity" class="d-none d-lg-flex d-md-flex">Số lượng</label>

                        <button class="outline-button" wire:click="decrease">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" width="16px" height="16px" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>

                        </button>

                        <input type="number" id="quantity" min="1" max="10" value="{{ $quantity }}"
                            wire:model.live="quantity">

                        <button class="outline-button" wire:click="increase">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" width="16px" height="16px" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                        </button>

                    </div>

                    <button class="add-cart-btn main-button" wire:click="addToCart()">Thêm Vào Giỏ Hàng</button>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="dish-description-wrap">
                    <div class="dish-description-title mb-3">
                        Mô tả sản phẩm
                    </div>

                    <div class="dish-description-content">
                        {{ $product['description'] }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@script
    <script>
        $(document).ready(function() {

            $('.size-btn').first().addClass('active')
            $('.size-btn').click(function() {

                $('.size-btn').removeClass('active')
                $(this).addClass('active')
            })

            $('.base-btn').first().addClass('active')
            $('.base-btn').click(function() {

                $('.base-btn').removeClass('active  ')
                $(this).addClass('active')
            })

            $('.border-btn').first().addClass('active')
            $('.border-btn').click(function() {

                $('.border-btn').removeClass('active')
                $(this).addClass('active')
            })

        })
        // Bắt sự kiện khi người dùng chưa đăng nhập
        $wire.on('notSignin', () => {
            Toastify({
                text: "Vui lòng đăng nhập !",
                duration: 1000,
                offset: {
                    x: 14,
                    y: 80
                },
                style: {
                    background: "red",
                    color: "white"
                }
            }).showToast();
        })
        // Bắt sự kiện sau khi thêm vào giỏ hàng thành công
        $wire.on('updatedCart', () => {
            Toastify({
                text: "Thêm vào giỏ hàng thành công",
                duration: 1000,
                offset: {
                    x: 14,
                    y: 80
                },
                style: {
                    background: "#7aa5d2",
                    color: "white"
                }
            }).showToast();
        })
    </script>
@endscript
