<div>
    <div class="container mt-5">


        <div class="row">
            <div class="col-3">

                <div class="menu-filter-wrap" wire:ignore>

                    <div class="menu-filter-title d-flex justify-content-between">

                        <p class="mb-3"></p>
                        <p>Tất cả</p>
                    </div>

                    <div class="menu-filter-item mb-3">

                        <div class="category-name d-flex align-items-center">

                            <p class="">Nguyên liệu</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>


                        <div class="wrap">

                            <button class="item" wire:click="category('Meat Lover\'s Pizza')"><span>Pizza
                                    Thịt</span></button>
                            <button class="item" wire:click="category('Vegetarian Pizza')"><span>Pizza Rau
                                    Củ</span></button>
                            <button class="item" wire:click="category('Seafood Pizza')"><span>Pizza Hải
                                    Sản</span></button>
                            <button class="item" wire:click="category('Cheese Pizza')"><span>Pizza Phô
                                    Mai</span></button>
                        </div>



                    </div>

                    {{-- <div class="menu-filter-item mb-3">

                        <div class="category-name d-flex align-items-center">

                            <p class="">Vùng miền</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>

                        
                        <div class="wrap">
                            
                            <button class="item" wire:click="category('Italian Pizza')">
                                <span>Pizza Ý</span>
                            </button>
                            <button class="item" wire:click="category('American Pizza')"><span>Pizza Mỹ</span></button>
                            <button class="item" wire:click="category(' cago Deep Dish')"><span>Pizza Việt Nam</span></button>
                            <button class="item" wire:click="category('Japanese Pizza')"><span>Pizza Nhật Bản</span></button>
                        </div>


                    </div> --}}

                    <div class="menu-filter-item mb-3">

                        <div class="category-name d-flex align-items-center">

                            <p class="">Khác</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-down">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </div>

                        <div class="wrap">

                            <button class="item" wire:click="category('Mỳ ý')"><span>Gà Rán</span></button>
                            <button class="item" wire:click="category('Hamburger')"><span>Hamburger</span></button>
                            <button class="item" wire:click="category('Bánh ngọt')"><span>Khoai Tây
                                    Chiên</span></button>
                            <button class="item" wire:click="category('Bánh ngọt')"><span>Hot dog</span></button>
                            <button class="item" wire:click="category('Bánh ngọt')"><span>Salad</span></button>
                            <button class="item" wire:click="category('Nước uống')"><span>Nước Uống</span></button>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-9">

                <div class="sort-by-wrap d-flex align-items-center justify-content-between">

                    <div>
                        <div class="filter-status-text">{{ $category }}</div>

                    </div>

                    <div class="sort-by">
                        <button>Giá</button>
                        {{-- <button>Đế bánh</button> --}}
                        <button>Kích thước</button>
                        {{-- <button>Loại</button> --}}
                    </div>
                </div>

                <div class="row">

                    @foreach ($products['data'] as $product)
                        <div class="col-4 mb-5">

                            <a href="{{ route('dish-details', $product['id']) }}" class="link" wire:navigate>

                                <div class="menu-item-wrap dish-item shadow">

                                    {{-- <div class="menu-item-message">
                                    Khuyến mãi
                                </div> --}}

                                    <div class="menu-item-img d-flex justify-content-center align-items-center">

                                        <img src="{{ asset($product['image']) }}" alt="">

                                    </div>

                                    <div class="menu-item-content p-3">
                                        <div class="menu-name">
                                            <p class="">{{ Str::limit($product['name'], 16, ' ...') }}</p>
                                        </div>


                                        <div class="menu-price">
                                            {{ $product['price'] }}đ
                                        </div>
                                    </div>


                                    <div class="menu-item-desc">
                                        {{ $product['description'] }}
                                    </div>

                                    <div class="nice-button more-btn">Xem thêm</div>
                                </div>
                            </a>

                        </div>
                    @endforeach

                    <div class="indicators d-flex justify-content-center mt-3">

                        @foreach (array_slice($products['links'], 1, count($products['links']) - 2) as $link)

                            <button wire:click="menu_pagination({{ $link['label'] }})"

                                class="{{ $link['active'] ? 'active' : '' }}"></button>

                        @endforeach

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {

            $('.menu-filter-item .wrap .item').click(function() {

                $('.menu-filter-item .wrap .item').removeClass('active')

                $(this).addClass('active')
            })

            $('.menu-filter-item .category-name').click(function() {

                $(this).next('.wrap').slideToggle('fast')
            })

        })
    </script>
@endsection
