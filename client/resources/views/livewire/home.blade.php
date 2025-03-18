<div>
    <div class="container-fluid bg-header-wrap">

        <div class="bg-header">

            <div class="slide-btn d-flex">

                <button class="prev" wire:click="prev">

                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-left">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>

            </div>
            <div>

                <img src="{{ asset($current_image) }}" alt="">

                <div class="indicators d-flex justify-content-center mt-3">

                    @foreach ($images as $i => $image)
                        <button wire:click="paginate_img({{ $i }})" class="{{ $i == $index ? 'active' : '' }}" ></button>
                    @endforeach

                </div>
            </div>


            <div class="slide-btn d-flex">

                <button class="next" wire:click="next">

                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>

            </div>

            <div class="bg-content">
                <div class="bg-text">

                    <p>Nguyên liệu tươi mới</p>
                    <p>Hương vị thơm ngon</p>

                    <div>Chào mừng bạn đến với NVD's Pizzeria. <br>
                        Một trong những chuỗi nhà hàng về thức ăn nhanh lớn số 1 Việt Nam. <br>
                        Hãy cùng nhau thưởng thức những món ăn ngon và mới lạ.
                    </div>

                </div>
                <div class="bg-more-btn">
                    <a href="/menu" wire:navigate.hover>
                        <button class="cold-button">
                            <span>Menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" width="16" height="16" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>

                    </a>
                </div>
            </div>


        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="col-3">
                <div class="home-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-thumbs-up">
                        <path d="M7 10v12" />
                        <path
                            d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z" />
                    </svg>

                    <div class="box-title">
                        <p>Chất lượng phục vụ</p>
                    </div>

                    <div class="box-content">
                        Chúng tôi luôn hỗ trợ khách hành tận tình. Mang đến một trải nghiệm tuyệt vời cho từng thực khác
                        đến
                        quán.
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="home-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-clock-8">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 8 14" />
                    </svg>

                    <div class="box-title">
                        <p>Giao hàng tận nơi</p>
                    </div>

                    <div class="box-content">
                        Hỗ trợ khách hàng đặt đồ ăn giao tận nơi, nhanh chóng và đơn giản thông qua hệ thống của chúng
                        tôi.
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="home-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-utensils">
                        <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                        <path d="M7 2v20" />
                        <path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                    </svg>

                    <div class="box-title">
                        <p>Món ngon mỗi ngày</p>
                    </div>

                    <div class="box-content">
                        Nhà hàng chúng tôi với đa dạng món ăn. Sử dụng nguyên liệu nhập khẩu, mang đến một hương vị khó
                        quên.
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="home-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-smile">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                        <line x1="9" x2="9.01" y1="9" y2="9" />
                        <line x1="15" x2="15.01" y1="9" y2="9" />
                    </svg>

                    <div class="box-title">
                        <p>Lắng nghe góp ý</p>
                    </div>

                    <div class="box-content">
                        Chúng tôi luôn ghi nhận những góp ý của khách hàng để ngày càng hoàn thiện hơn chất lượng cho
                        nhà hàng.
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container mt-5">

        {{-- Outstanding --}}

        <div class="row">

            <div class="col-12 mb-5">
                <div class="home-product-title">
                    <p class="title-text">Món tiêu biểu</p>
                    <div class="high-light"></div>

                </div>
            </div>

            <div class="more-text">

                <a href="/menu" wire:navigate.hover>
                    <span class="">Xem thêm</span>

                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </a>
            </div>

            @foreach ($current_products['data'] as $product)
                <div class="col-3">
                    <div class="home-otd-product-wrap shadow">
                        <img src="{{ asset($product['image']) }}" alt="">

                        <div class="product-content d-flex flex-column justify-content-center align-items-center mt-4">

                            <p class="">{{ Str::limit($product['name'], 16, '...') }}</p>

                            <a href="{{ route('dish-details', $product['id']) }}" wire:navigate.hover><button
                                    class="cold-button">Xem thêm</button></a>


                        </div>
                    </div>
                </div>
            @endforeach

            <div class="indicators d-flex justify-content-center mt-3">

                @foreach (array_slice($current_products['meta']['links'], 1, 3) as $link)
                    <button wire:click="typical_dish_pagination({{ $link['label'] }})"
                        class="{{ $link['active'] ? 'active' : '' }}"></button>
                @endforeach

            </div>

        </div>



    </div>

    <div class="container home-product-infor-wrap">

        {{-- Information --}}
        <div class="row justify-content-center">
            <div class="col-8 top-box">

                <div class="home-product-infor">
                    <img src="{{ asset('Products/pizza-mix.webp') }}" alt="">
                </div>

            </div>

            <div class="col-12 bottom-box">
                <div class="home-product-infor-content d-flex justify-content-center align-items-end">
                    <div class="content-wrap shadow">
                        <div class="total d-flex align-items-center">
                            <span>200</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                <path d="M5 12h14" />
                                <path d="M12 5v14" />
                            </svg>
                        </div>
                        <div class="title"><span>Đơn hàng</span></div>
                        <div class="content"><span>Hơn 200 đơn hàng được đặt mỗi ngày.</span></div>
                    </div>

                    <div class="content-wrap shadow">
                        <div class="total d-flex align-items-center">
                            <span>50</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                <path d="M5 12h14" />
                                <path d="M12 5v14" />
                            </svg>
                        </div>
                        <div class="title"><span>Món ăn</span></div>
                        <div class="content"><span>Thực đơn đa dạng với hơn 50 món.</span></div>
                    </div>

                    <div class="content-wrap shadow">
                        <div class="total d-flex align-items-center">
                            <span>10</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                <path d="M5 12h14" />
                                <path d="M12 5v14" />
                            </svg>
                        </div>
                        <div class="title"><span>Chi Nhánh</span></div>
                        <div class="content"><span>Hơn 10 chi nhánh khắp cả nước.</span></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Menu noi bat --}}
    <div class="container home-menu">
        <div class="row">
            <div class="col-12">
                <p class="title-text">Menu nổi bật</p>

                <div class="high-light"></div>

            </div>
            <div class="col-6">
                <div class="row row-gap-4">
                    @for ($i = 1; $i <= count($menu) / 2; $i++)
                        <div class="col-12 ">
                            <div class="home-menu-item d-flex align-items-center mt-4 column-gap-4">
                                <div class="home-menu-img">
                                    <img src="{{ asset($menu[$i]["image"]) }}" alt="">
                                </div>

                                <div class="home-menu-content">
                                    <div class="d-flex justify-content-between">

                                        <div class="home-menu-name">{{ $menu[$i]["name"] }}</div>
                                        <div class="home-menu-price">{{ $menu[$i]["price"] }}</div>
                                    </div>

                                    <div class="separation"></div>

                                    <div class="home-menu-desc">{{ $menu[$i]["description"]}}</div>
                                </div>
                            </div>
                        </div>
                    @endfor


                </div>

            </div>
            <div class="col-6">
                <div class="row row-gap-4">
                    @for ($i = count($menu) / 2; $i <= count($menu) - 1; $i++)
                        <div class="col-12">
                            <div class="home-menu-item d-flex align-items-center mt-4 column-gap-4">
                                <div class="home-menu-img">
                                    <img src="{{ asset($menu[$i]["image"]) }}" alt="">
                                </div>

                                <div class="home-menu-content">
                                    <div class="d-flex justify-content-between">

                                        <div class="home-menu-name">{{ $menu[$i]["name"] }}</div>
                                        <div class="home-menu-price">{{ $menu[$i]["price"] }}</div>
                                    </div>

                                    <div class="separation"></div>

                                    <div class="home-menu-desc">{{ $menu[$i]["description"] }}</div>
                                </div>
                            </div>
                        </div>
                    @endfor


                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 news-wrap">

        {{-- News --}}
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <div class="home-product-title">
                        <p class="news-title">Tin tức</p>
                    </div>
                </div>

                <div class="more-text">

                    <a href="/news" wire:navigate.hover>

                        <span class="">Xem thêm</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </span>
                    </a>

                </div>

                <div class="row">

                    <div class="row mt-3">

                        <div class="col-3">

                            <a href="" class="news-link">

                                <div class="news-item">
                                    <div class="img-wrap">

                                        <img src="{{ asset('news_1.webp') }}" alt="">
                                    </div>


                                    <div class="news-time">
                                        1/1/1919
                                    </div>
                                    <div class="news-title">
                                        Pizza ngon nhất thế giới
                                    </div>

                                    <div class="news-content">
                                        pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ
                                        Duy.
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-3">
                            <a href="" class="news-link">

                                <div class="news-item">
                                    <div class="img-wrap">

                                        <img src="{{ asset('news_2.webp') }}" alt="">
                                    </div>

                                    <div class="news-time">
                                        1/1/1919
                                    </div>
                                    <div class="news-title">
                                        Pizza ngon nhất thế giới
                                    </div>

                                    <div class="news-content">
                                        pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ
                                        Duy.
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="" class="news-link">

                                <div class="news-item">
                                    <div class="img-wrap">

                                        <img src="{{ asset('news_3.jpg') }}" alt="">
                                    </div>

                                    <div class="news-time">
                                        1/1/1919
                                    </div>
                                    <div class="news-title">
                                        Pizza ngon nhất thế giới
                                    </div>

                                    <div class="news-content">
                                        pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ
                                        Duy.
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="" class="news-link">

                                <div class="news-item">
                                    <div class="img-wrap">

                                        <img src="{{ asset('news_4.jpg') }}" alt="">
                                    </div>

                                    <div class="news-time">
                                        1/1/1919
                                    </div>
                                    <div class="news-title">
                                        Pizza ngon nhất thế giới
                                    </div>

                                    <div class="news-content">
                                        pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ
                                        Duy.
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-3 mt-5">
                            <a href="" class="news-link">

                                <div class="news-item">
                                    <div class="img-wrap">

                                        <img src="{{ asset('news_3.jpg') }}" alt="">
                                    </div>

                                    <div class="news-time">
                                        1/1/1919
                                    </div>
                                    <div class="news-title">
                                        Pizza ngon nhất thế giới
                                    </div>

                                    <div class="news-content">
                                        pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ
                                        Duy.
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3 mt-5">
                            <a href="" class="news-link">

                                <div class="news-item">
                                    <div class="img-wrap">

                                        <img src="{{ asset('news_4.jpg') }}" alt="">
                                    </div>

                                    <div class="news-time">
                                        1/1/1919
                                    </div>
                                    <div class="news-title">
                                        Pizza ngon nhất thế giới
                                    </div>

                                    <div class="news-content">
                                        pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ
                                        Duy.
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
