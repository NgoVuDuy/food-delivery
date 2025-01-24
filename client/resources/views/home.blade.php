@extends('layouts.main')

@section('title', 'Trang chủ')

@section('css')

@endsection

@section('content')

    <div class="container-fluid bg-header-wrap">
        <div class="bg-header">
            <img src="{{ asset('bg_2.webp') }}" alt="" width="100%" height="100%">

            <div class="bg-content">
                <div class="bg-text">

                    <p>Chào mừng bạn đến với Food delivery</p>
                    <p>Hãy thưởng thức món ngon<br>cùng gia đình</p>
                </div>

                <div class="bg-more-btn">
                    <button class="cold-button">
                        <span>Menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            width="16" height="16" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        {{-- Outstanding --}}

        <div class="row">

            <div class="col-12 mb-5">
                <div class="home-product-title">
                    <p class="grad-text title-text">Thực đơn tiêu biểu</p>
                </div>
            </div>

            <div class="col-4">
                <div class="home-otd-product-wrap">
                    <img src="{{ asset('Products/pizza-home-1.png') }}" alt="">

                    <div class="product-content d-flex flex-column justify-content-center align-items-center mt-5">

                        <p>PIZZA PHÔ MAI</p>
                        <button class="cold-button">Xem thêm</button>

                    </div>
                </div>
            </div>
            <div class="col-4">

                <div class="home-otd-product-wrap">
                    <img src="{{ asset('Products/pizza-home-2.png') }}" alt="">

                    <div class="product-content d-flex flex-column justify-content-center align-items-center mt-5">

                        <p>PIZZA HẢI SẢN</p>
                        <button class="cold-button">Xem thêm</button>
                    </div>
                </div>

            </div>
            <div class="col-4">

                <div class="home-otd-product-wrap">
                    <img src="{{ asset('Products/pizza-home-3.png') }}" alt="">

                    <div class="product-content d-flex flex-column justify-content-center align-items-center mt-5">

                        <p>PIZZA XÚC XÍCH</p>
                        <button class="cold-button">Xem thêm</button>

                    </div>
                </div>

            </div>
        </div>



    </div>

    <div class="container-fluid home-product-infor-wrap">

        {{-- Information --}}
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="home-product-infor">
                    <img src="{{ asset('Products/pizza-mix.webp') }}" alt="">
                </div>

            </div>

            <div class="col-12">
                <div class="home-product-infor-content">

                </div>
            </div>
        </div>
    </div>

    {{-- Menu noi bat --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="grad-text title-text">Menu nổi bật</p>

            </div>
            <div class="col-6">
                <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-12">
                            <div class="home-menu-item d-flex align-items-center mt-4">
                                <div class="home-menu-img">
                                    <img src="{{ asset('Products/10099238.jpg') }}" alt="">
                                </div>

                                <div class="home-menu-content">
                                    <div class="d-flex justify-content-between">

                                        <div class="home-menu-name">Pizza phô mai ý</div>
                                        <div class="home-menu-price grad-text">125.000đ</div>
                                    </div>

                                    <div class="separation"></div>

                                    <div class="home-menu-desc">Phô mai được nhập khẩu trực tiếp từ Ý</div>
                                </div>
                            </div>
                        </div>
                    @endfor


                </div>

            </div>
            <div class="col-6">
                <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-12">
                            <div class="home-menu-item d-flex align-items-center mt-4">
                                <div class="home-menu-img">
                                    <img src="{{ asset('Products/10099238.jpg') }}" alt="">
                                </div>

                                <div class="home-menu-content">
                                    <div class="d-flex justify-content-between">

                                        <div class="home-menu-name">Pizza phô mai ý</div>
                                        <div class="home-menu-price grad-text">125.000đ</div>
                                    </div>

                                    <div class="separation"></div>

                                    <div class="home-menu-desc">Phô mai được nhập khẩu trực tiếp từ Ý</div>
                                </div>
                            </div>
                        </div>
                    @endfor


                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 home-news-wrap">

        {{-- News --}}
        <div class="container">

            <div class="row">

                <div class="col-12 mb-3">
                    <div class="home-product-title">
                        <p class="home-news-title">Tin tức</p>
                    </div>
                </div>

                <div class="col-3">
                    <div class="home-news-item">
                        <img src="{{ asset('news_1.webp') }}" alt="">

                        <div class="news-time">
                            1/1/1919
                        </div>
                        <div class="news-title">
                            Pizza ngon nhất thế giới
                        </div>

                        <div class="news-content">
                            pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ Duy.
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="home-news-item">
                        <img src="{{ asset('news_2.webp') }}" alt="">

                        <div class="news-time">
                            1/1/1919
                        </div>
                        <div class="news-title">
                            Pizza ngon nhất thế giới
                        </div>

                        <div class="news-content">
                            pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ Duy.
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="home-news-item">
                        <img src="{{ asset('news_3.jpg') }}" alt="">

                        <div class="news-time">
                            1/1/1919
                        </div>
                        <div class="news-title">
                            Pizza ngon nhất thế giới
                        </div>

                        <div class="news-content">
                            pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ Duy.
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="home-news-item">
                        <img src="{{ asset('news_4.jpg') }}" alt="">

                        <div class="news-time">
                            1/1/1919
                        </div>
                        <div class="news-title">
                            Pizza ngon nhất thế giới
                        </div>

                        <div class="news-content">
                            pizza ngon nhất thế giới được bình chọn bởi tỷ phú giàu nhất thế giới Ngô Vũ Duy.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('js')

@endsection
