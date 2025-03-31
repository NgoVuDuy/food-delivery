<div>
    <div class="container menu-wrap">


        <div class="row">
            <div class="col-lg-3 col-12">

                <div class="menu-filter-wrap" wire:ignore>

                    <div class="menu-filter-title d-flex justify-content-between">

                        <p class="mb-3"></p>

                        <button wire:click="show_all_products_btn" class="show-all">Tất cả</button>
                    </div>

                    <div class="menu-filter-item mb-3">

                        <div class="category-name d-flex align-items-center">

                            <p class="d-lg-block d-md-block d-none">Phân Loại</p>

                        </div>

                        <div class="wrap">

                            @foreach ($categories as $category)
                                <button class="item"
                                    wire:click="category({{ $category['id'] }}, '{{ $category['name'] }}')">

                                    <span>{{ $category['name'] }}
                                    </span>

                                </button>
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-9 col-12">

                <div class="sort-by-wrap d-flex align-items-center justify-content-between">

                    <div>
                        <div class="filter-status-text">{{ $category_name }}</div>

                    </div>

                    <div class="sort-by d-none">
                        <button>Giá</button>
                        <button>Kích thước</button>
                    </div>
                </div>

                <div class="row products-wrap row-gap-4  {{ count($products['data']) > 9 ? 'products-scroll' : '' }}">
                    @foreach ($products['data'] as $index => $product)
                        <div class="col-lg-4 col-6">

                            <a href="{{ route('dish-details', $product['id']) }}" class="link" wire:navigate>

                                <div class="menu-item-wrap dish-item shadow" {{-- wire:mouseover="is_hover(true, {{ $index }})"
                                    wire:mouseout="is_hover(false, {{ $index }})" --}}>

                                    <div class="menu-item-img d-flex justify-content-center align-items-center">

                                        <img src="{{ asset($product['image']) }}" alt="">

                                    </div>

                                    <div class="menu-item-content p-3">
                                        <div class="menu-name">

                                            {{-- <p class="">
                                                {{ $isHovered[$index] ? $product['name'] : Str::limit($product['name'], 16, ' ...') }}
                                            </p> --}}
                                            <p class="">
                                                {{ $product['name'] }}
                                            </p>
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

                    {{-- <div class="indicators d-flex justify-content-center mt-3">

                        @foreach (array_slice($products['meta']['links'], 1, count($products['links']) - 2) as $link)
                            <button wire:click="menu_pagination({{ $link['label'] }})"
                                class="{{ $link['active'] ? 'active' : '' }}"></button>
                        @endforeach

                    </div> --}}
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

            $('.show-all').click(function() {

                $('.menu-filter-item .wrap .item').removeClass('active')

                // $(this).addClass('active')
            })

        })
    </script>
@endsection
