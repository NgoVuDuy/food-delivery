<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container mt-5">
        <div class="row">
            <p class="search-text-wrap">Kết quả tìm kiếm cho: <span>{{ $search_text }}</span></p>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-3 mb-5">

                            <a href="{{ route('dish-details', $product['id']) }}" class="link" wire:navigate>

                                <div class="menu-item-wrap dish-item shadow">


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
                </div>
            </div>
        </div>
    </div>
</div>
